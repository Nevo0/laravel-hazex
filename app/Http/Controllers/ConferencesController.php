<?php

namespace App\Http\Controllers;

use App\Models\Conferences;
use App\Models\ConferencesInactive;
use App\Models\ConferencesActive;
use Illuminate\Http\Request;
// use App\Http\Controllers\ConferencesActiveController;
// use App\Http\Controllers\ConferencesInactiveController;

class ConferencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datap['ConferencesActive'] = ConferencesActive::get();
        $datap['ConferencesInactive'] = ConferencesInactive::get();
        dump($datap);
        return view('cm.home', compact('datap'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conferences  $conferences
     * @return \Illuminate\Http\Response
     */
    public function show(Conferences $conferences)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Conferences  $conferences
     * @return \Illuminate\Http\Response
     */
    public function edit(Conferences $conferences)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conferences  $conferences
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conferences $conferences)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conferences  $conferences
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conferences $conferences)
    {
        //
    }
}
