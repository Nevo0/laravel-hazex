<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\ConferencesActive;
use App\Http\Resources\Session as SessionResource;
use Illuminate\Http\Request;

class ConferenceSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sestion =Session::get();
         return SessionResource::collection($sestion);
    }

    public function allactiveconferencs()
    {
        $x=ConferencesActive::select('id_cm','room_type','room_pin','name','name_url','starts_at','ends_at')->get()->toArray();
        // var_dump($x);
        $sestion =Session::get();
        
         return SessionResource::collection($x);
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
     * @param  \App\Models\ConferenceSession  $conferenceSession
     * @return \Illuminate\Http\Response
     */
    public function show(ConferenceSession $conferenceSession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConferenceSession  $conferenceSession
     * @return \Illuminate\Http\Response
     */
    public function edit(ConferenceSession $conferenceSession)
    {
        //
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConferenceSession  $conferenceSession
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConferenceSession $conferenceSession)
    {
        //
    }
}
