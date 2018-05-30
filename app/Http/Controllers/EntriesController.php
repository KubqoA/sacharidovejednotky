<?php

namespace App\Http\Controllers;

use App\Entry;
use App\Http\Requests\StoreEntry;
use App\Http\Requests\StoreMealEntry;
use App\Meal;
use App\MealCategory;
use App\Repositories\EntryRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EntriesController extends Controller
{
    /**
     * @var EntryRepository
     */
    protected $repository;

    public function __construct(EntryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entries = $this->repository->all();
        $daily_sj = $this->repository->getSjForDay();
        return view('home', compact('entries', 'daily_sj'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entry.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreEntry  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEntry $request)
    {
        $this->repository->store($request->validated());
        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function show(Entry $entry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function edit(Entry $entry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entry $entry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entry $entry
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Entry $entry)
    {
        $entry->delete();
        return redirect(route('home'));
    }

    public function storeMealEntry(Meal $meal, StoreMealEntry $request)
    {
        $sj = null;
        if ($request->quantity_unit == $meal->unit) {
            $sj = $request->quantity / $meal->base_amount * $meal->whole_meal_sj;
        } else if ($request->quantity_unit == 'ks') {
            $sj = $request->quantity * $meal->whole_meal_sj;
        }
        $this->repository->store(array_merge(
            $request->validated(),
            [
                'name' => $meal->name,
                'sj' => $sj,
            ]
        ));
        return redirect(route('home'));
    }
}
