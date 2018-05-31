<?php

namespace App\Http\Controllers;

use App\Entry;
use App\Http\Requests\UpdateUser;
use Auth;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use DatePeriod;

class UserController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('user.settings', ['user' => Auth::user()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateUser  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request)
    {
        Auth::user()->update(array_filter($request->validated()));
        return redirect(route('user.edit'));
    }

    public function summary()
    {
        $entries = Entry::whereDate('created_at', '>', now()->startOfDay()->subWeek())->get();
        $dates = $this->date_range(now()->subWeek(),now());
        return view('user.summary', compact('entries', 'dates'));
    }

    /**
     * Compute a range between two dates, and generate
     * a plain array of Carbon objects of each day in it.
     *
     * @param  Carbon  $from
     * @param  Carbon  $to
     * @param  bool  $inclusive
     * @return array|null
     *
     * @author Tristan Jahier
     */
    private function date_range(Carbon $from, Carbon $to, $inclusive = true)
    {
        if ($from->gt($to)) {
            return null;
        }

        // Clone the date objects to avoid issues, then reset their time
        $from = $from->copy()->startOfDay();
        $to = $to->copy()->startOfDay();

        // Include the end date in the range
        if ($inclusive) {
            $to->addDay();
        }

        $step = CarbonInterval::day();
        $period = new DatePeriod($from, $step, $to);

        // Convert the DatePeriod into a plain array of Carbon objects
        $range = [];

        foreach ($period as $day) {
            $range[] = new Carbon($day);
        }

        return ! empty($range) ? $range : null;
    }
}
