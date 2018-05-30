<?php

namespace App\Console\Commands;

use App\Meal;
use App\MealCategory;
use Illuminate\Console\Command;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

class GetMeals extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get-meals';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get meals from http://www.sacharidydovrecka.sk';

    /**
     * The url to scrape
     *
     * @var string
     */
    protected static $url = 'http://www.sacharidydovrecka.sk';

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var MealCategory
     */
    protected $mealCategory;

    /**
     * @var Meal
     */
    protected $meal;

    /**
     * Create a new command instance.
     *
     * @param Client $client
     */
    public function __construct(Client $client, MealCategory $mealCategory, Meal $meal)
    {
        parent::__construct();
        $this->client = $client;
        $this->mealCategory = $mealCategory;
        $this->meal = $meal;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->getCategories();
        $this->getSJ();
        return true;
    }

    /**
     * For scraping data for the specified collection.
     */
    public function getCategories()
    {
        $categories=array();

        $crawler = $this->client->request('GET', self::$url);

        $crawler->filter('header .nav .dropdown-menu > li a')->each(function ($node) use (&$categories) {
            $categories[]=['url' => $node->attr('href'), 'name' => $node->text()];
        });

        unset($categories[18]);

        $this->mealCategory->insert($categories);
    }

    public function getSJ()
    {
        $categories = $this->mealCategory->all();

        $meals = array();

        $categories->each(function ($category) use (&$meals) {
            $this->info('Ziskavam jedla z kategorie '.$category->name . "\n");
            $crawler = $this->client->request('GET', self::$url.$category->url);
            $crawler->filter('.product')->each(function (Crawler $node) use (&$meals,&$category) {
                $title = $node->filter('h2 a')->text();
                $arr=preg_split("/\s+(?=\S*+$)/",$title);
                $unit=$arr[1];
                if (str_contains($unit, '103gramov')) {
                    $arr[1] = 103;
                    $unit='gramov';
                } else {
                    $arr=preg_split("/\s+(?=\S*+$)/",$arr[0]);
                    if (str_contains($arr[1],'gramov')) {
                        $arr=preg_split("/\s+(?=\S*+$)/",$arr[0]);
                    }
                }
                $title=$arr[0];
                $amount=$arr[1];
                if (str_contains($unit,'mililitra')) {
                    $unit="ml";
                } else if (str_contains($unit,'gramov')) {
                    $unit="g";
                }
                if (str_contains($amount, '40g')) {
                    $amount=40;
                    $unit="g";
                }
                if(!is_numeric(str_replace(",", ".", $amount))) {
                    $this->warn('Jedlo '.$title.' ma neplatne mnozstvo: '.$amount."\n");
                }
                $meals[] = [
                    "name" => $title,
                    "whole_meal_sj" => floatval(str_replace(",", ".", $node->filter('tr')->eq(1)->filter('td')->last()->text())),
                    "grams_per_sj" => floatval(str_replace(",", ".", $node->filter('tr')->last()->filter('td')->last()->text())),
                    "base_amount" => floatval(str_replace(",", ".", $amount)),
                    "unit" => $unit,
                    "meal_category_id" => $category->id,
                ];
            });
            $this->info('Uz mam '.sizeof($meals). 'jedal'."\n");
        });

        $this->meal->insert($meals);
    }
}
