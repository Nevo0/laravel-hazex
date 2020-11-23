<?php

namespace App\Http\Controllers;

use App\Models\ConferencesInactive;
use Illuminate\Http\Request;

class ConferencesInactiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new ClickMeetingRestClient(array('api_key' => env('CM_KEY')));
        $datap['ConferencesinActiveAPI']=[];

        $datap['ConferencesInactive'] = ConferencesInactive::orderByDesc('starts_at')->paginate(12);
        // $datap['ConferencesInactive'] = $datap['ConferencesInactive']->toJson();
        $datap['ConferencesInactive'] = $datap['ConferencesInactive']->toArray();
        // $datap['ConferencesInactive'] = ConferencesInactive::select('id_cm','room_type','room_pin','name','name_url',)->get()->attributesToArray();
        $room_id= 4346625;
        $datap['sessions'] = $client->conferenceSessions($room_id);
        $session_id=  $datap['sessions'][0]->id;
        $datap['session'] = $client->conferenceSession($room_id, $session_id);
        dump($datap);
        return view('cm.list2', compact('datap'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function chek()
    {
        //
        $client = new ClickMeetingRestClient(array('api_key' => env('CM_KEY')));
        $datap['ConferencesinActiveAPI'] = $client->conferences('inactive');
        $datap['API']=[];

        if (count( $datap['ConferencesinActiveAPI'])) {
            foreach ($datap['ConferencesinActiveAPI'] as $key => $conference)
            {
                // [ $conference->id =>$id]]
                $is = ConferencesInactive::where('id_cm', $conference->id)->first();
                if (!$is) {
                    array_push($datap['API'],$conference);
                    $this->store($conference);

                }
            }
        }
        return view('cm.list', compact('datap'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( $conference)
    {
                $ca= new ConferencesInactive;
                $ca->id_cm = $conference->id;
                $ca->room_type = $conference->room_type;
                $ca->room_pin = $conference->room_pin;
                $ca->name = $conference->name;
                $ca->name_url = $conference->name_url;
                if (!empty($conference->starts_at)) {
                   $ca->starts_at = date('Y-m-d h:i:s', strtotime($conference->starts_at));
                }
                if (!empty($conference->ends_at)) {
                    $ca->ends_at = date('Y-m-d h:i:s', strtotime($conference->ends_at));
                  }
                $ca->access_type = $conference->access_type;
                $ca->lobby_enabled = $conference->lobby_enabled;
                $ca->lobby_description = $conference->lobby_description;
                $ca->registration_enabled = $conference->registration_enabled;
                $ca->status = $conference->status;
                $ca->timezone = $conference->timezone;
                $ca->timezone_offset = $conference->timezone_offset;
                $ca->paid_enabled = $conference->paid_enabled;
                $ca->automated_enabled = $conference->automated_enabled;
                $ca->created_at = date('Y-m-d h:i:s', strtotime($conference->created_at));
                $ca->updated_at =date('Y-m-d h:i:s', strtotime($conference->updated_at));
                $ca->type = $conference->type;
                $ca->permanent_room = $conference->permanent_room;
                if (!empty($conference->ccc)) {
                    $ca->ccc = $conference->ccc;
                  }
                $ca->access_role_hashes = json_encode($conference->access_role_hashes);
                $ca->room_url = $conference->room_url;
                $ca->phone_presenter_pin = $conference->phone_presenter_pin;
                $ca->phone_listener_pin = $conference->phone_listener_pin;
                $ca->embed_room_url = $conference->embed_room_url;
                $ca->widgets_hash = $conference->widgets_hash;
                $ca->recorder_list = json_encode($conference->recorder_list);
                $ca->settings = json_encode($conference->settings);
                $ca->autologin_hashes = json_encode($conference->autologin_hashes);
                $ca->autologin_hash = $conference->autologin_hash;
                $ca->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConferencesInactive  $conferencesInactive
     * @return \Illuminate\Http\Response
     */
    public function show(ConferencesInactive $conferencesInactive,Request $request ,$id)
    {
        $datap=$conferencesInactive->findOrFail($id);
        dump($datap,$request,$id);
        return $id;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConferencesInactive  $conferencesInactive
     * @return \Illuminate\Http\Response
     */
    public function edit(ConferencesInactive $conferencesInactive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ConferencesInactive  $conferencesInactive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConferencesInactive $conferencesInactive)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConferencesInactive  $conferencesInactive
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConferencesInactive $conferencesInactive)
    {
        //
    }
    public function updateClickMetting(Request $request)
    {
        $datap=[];

        $client = new ClickMeetingRestClient(array('api_key' => env('CM_KEY')));
        try {
            $conferences = $client->conferences('inactive');
        } catch (\Throwable $th) {
            //throw $th;
        }
        foreach ($conferences as $key => $conference) {
            $is = ConferencesInactive::where('id_cm', $conference->id)->first();



            if ($is == null) {
                $datap["id"] = $is;
                $datap["conference"] = $conference;
                $datap["conference->id"] = $conference->id;
                dump($datap);
                $ca= new ConferencesInactive;
                $ca->id_cm = $conference->id;
                $ca->room_type = $conference->room_type;
                $ca->room_pin = $conference->room_pin;
                $ca->name = $conference->name;
                $ca->name_url = $conference->name_url;
                if (!empty($conference->starts_at)) {
                   $ca->starts_at = date('Y-m-d h:i:s', strtotime($conference->starts_at));
                }
                if (!empty($conference->ends_at)) {
                    $ca->ends_at = date('Y-m-d h:i:s', strtotime($conference->ends_at));
                  }
                $ca->access_type = $conference->access_type;
                $ca->lobby_enabled = $conference->lobby_enabled;
                $ca->lobby_description = $conference->lobby_description;
                $ca->registration_enabled = $conference->registration_enabled;
                $ca->status = $conference->status;
                $ca->timezone = $conference->timezone;
                $ca->timezone_offset = $conference->timezone_offset;
                $ca->paid_enabled = $conference->paid_enabled;
                $ca->automated_enabled = $conference->automated_enabled;
                $ca->created_at = date('Y-m-d h:i:s', strtotime($conference->created_at));
                $ca->updated_at =date('Y-m-d h:i:s', strtotime($conference->updated_at));
                $ca->type = $conference->type;
                $ca->permanent_room = $conference->permanent_room;
                if (!empty($conference->ccc)) {
                    $ca->ccc = $conference->ccc;
                  }
                $ca->access_role_hashes = json_encode($conference->access_role_hashes);
                $ca->room_url = $conference->room_url;
                $ca->phone_presenter_pin = $conference->phone_presenter_pin;
                $ca->phone_listener_pin = $conference->phone_listener_pin;
                $ca->embed_room_url = $conference->embed_room_url;
                $ca->widgets_hash = $conference->widgets_hash;
                $ca->recorder_list = json_encode($conference->recorder_list);
                $ca->settings = json_encode($conference->settings);
                $ca->autologin_hashes = json_encode($conference->autologin_hashes);
                $ca->autologin_hash = $conference->autologin_hash;
                $ca->save();

        }

    }

       if (false) {
        foreach ($conferences as $key => $conference) {

            // if (true) {
            //     # code...
            //     var_dump($conference->lobby_description);
            // }
            $ca= new ConferencesInactive;
            $ca->id_cm = $conference->id;
            $ca->room_type = $conference->room_type;
            $ca->room_pin = $conference->room_pin;
            $ca->name = $conference->name;
            $ca->name_url = $conference->name_url;
            if (!empty($conference->starts_at)) {
                echo $conference->starts_at;

                $ca->starts_at = date('Y-m-d h:i:s', strtotime($conference->starts_at));
            }
            if (!empty($conference->ends_at)) {

                echo $conference->ends_at;
                $ca->ends_at = date('Y-m-d h:i:s', strtotime($conference->ends_at));
              }
            $ca->access_type = $conference->access_type;
            $ca->lobby_enabled = $conference->lobby_enabled;
            $ca->lobby_description = $conference->lobby_description;
            $ca->registration_enabled = $conference->registration_enabled;
            $ca->status = $conference->status;
            $ca->timezone = $conference->timezone;
            $ca->timezone_offset = $conference->timezone_offset;
            $ca->paid_enabled = $conference->paid_enabled;
            $ca->automated_enabled = $conference->automated_enabled;
            $ca->created_at = date('Y-m-d h:i:s', strtotime($conference->created_at));
            $ca->updated_at =date('Y-m-d h:i:s', strtotime($conference->updated_at));
            $ca->type = $conference->type;
            $ca->permanent_room = $conference->permanent_room;
            if (!empty($conference->ccc)) {

                // echo $conference->ends_at;
                $ca->ccc = $conference->ccc;
                // $ca->ends_at = date('Y-m-d h:i:s', strtotime($conference->ends_at));
              }

            $ca->access_role_hashes = json_encode($conference->access_role_hashes);
            $ca->room_url = $conference->room_url;
            $ca->phone_presenter_pin = $conference->phone_presenter_pin;
            $ca->phone_listener_pin = $conference->phone_listener_pin;
            $ca->embed_room_url = $conference->embed_room_url;
            $ca->widgets_hash = $conference->widgets_hash;
            $ca->recorder_list = json_encode($conference->recorder_list);
            $ca->settings = json_encode($conference->settings);
            $ca->autologin_hashes = json_encode($conference->autologin_hashes);
            $ca->autologin_hash = $conference->autologin_hash;
            $ca->save();

            // var_dump($conference->starts_at) ;
        }
        // return redirect('cm/n')->with('status', 'ConferencesInactive updated!');
    }
    // return redirect('cm/n')->with('status', 'ConferencesInactive not updated!');



        // $user = new User;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = $request->password;
        // $user->save();
        $data=[];

        // $data['conferences']=$conferences[0]->starts_at;
        // var_dump($data);
        // return redirect()->back()->with('success', 'User has been added successfully');
        // dump($conferences);
        return view('cm.home', compact('datap'));

    }
}
