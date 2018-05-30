<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUser;
use Auth;

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

    }
}
