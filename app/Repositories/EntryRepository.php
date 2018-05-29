<?php

namespace App\Repositories;

use App\Entry;
use App\Http\Requests\StoreEntry;

class EntryRepository
{
    /**
     * @var  Entry
     */
    protected $model;

    public function __construct(Entry $model)
    {
        $this->model = $model;
    }

    /**
     * Get all the entry models
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->model->latest()->get();
    }

    public function store(StoreEntry $request)
    {
        return \Auth::user()->entries()->create($request->validated());
    }
}
