<?php

namespace App\Http\Controllers;

use App\Models\ConferencesInactive;
use App\Http\Controllers\SalesmanagoController as SM;
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
        $datap['ConferencesActiveAPI'] = $client->conferences('inactive');
        dump($datap);
    }
    public function send_to_SM_visitors_witch_tag()
    {
        
        $client = new ClickMeetingRestClient(array('api_key' => env('CM_KEY')));
  

        $datap['ConferencesInactive'] = ConferencesInactive::orderByDesc('starts_at')->paginate(15);
        // $datap['ConferencesInactive'] = $datap['ConferencesInactive']->toJson();
        $datap['ConferencesInactive'] = $datap['ConferencesInactive']->toArray();
        foreach ($datap['ConferencesInactive']['data'] as $key => $sessions)
        {
            $inactive_id =$sessions['id'];
            $starts_at = date('Y-m-d', strtotime($sessions['starts_at']));
            // dump($starts_at);
            $room_id =$sessions['id_cm'];
            if ($sessions['access_type'] == 1) {
                // bedziemy zmienac ta wartośc jesli została dodana osoba z sukcesem, aby działało jak na razie 1
                if ($sessions['type'] == 0) {
                  var_dump('wyladowania-elektrostatyczne-jako-przyczyna-wybuchu-jak-sie-chronic');
                }else{
                    $datap['sessions'][$key] = $client->conferenceSessions($sessions["id_cm"]);   
                    foreach ($datap['sessions'][$key] as $key2 => $session)
                        {
                            $session_id= $session->id;
                            $visitors=  $this->update2($room_id, $session_id);
                            $datap['sessions'][$key]['visitors']= $visitors;
    
                        }
                        $salesmanagoController = new SalesmanagoController();
                        $sm_r = $salesmanagoController->process_contact_form_sm2($visitors, $sessions['name_url'] ,$starts_at);
                        // echo $salesmanagoController->send_tag_to_sm(1);
                        // var_dump($sm_r);
                        $this->updateA($inactive_id);
                }
               
                }
            
        }  
        return;
        // dump($datap);
        // $datap['ConferencesInactive'] = ConferencesInactive::select('id_cm','room_type','room_pin','name','name_url',)->get()->attributesToArray();
        
        // $datap['sessions'] = $client->conferenceSessions($room_id);

        // $session_id=  $datap['sessions'][0]->id;
        // $datap['session'] = $client->conferenceSession($room_id, $session_id);
        // // $client = new ClickMeetingRestClient($cm_api_KEY);
        // try {
        //     $datap['sessionattendees'] = $client->conferenceSessionAttendees($room_id, $session_id);
        //     $datap['sessionsessions'] = $client->conferenceSessions("3766615");
        //     // var_dump($sessions);
        //     // echo "</br>";
        //     // var_dump($attendees);
        //     // echo "</br>";
        // } catch (Exception $e) {
        //     // handle exceptions here
        // }
       
        // return view('cm.list2', compact('datap'));
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
               
                $ca->room_url = $conference->room_url;
                $ca->phone_presenter_pin = $conference->phone_presenter_pin;
                $ca->phone_listener_pin = $conference->phone_listener_pin;
                $ca->embed_room_url = $conference->embed_room_url;
                $ca->widgets_hash = $conference->widgets_hash;                
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
    public function updateA($id)
    {
        $conferencesInactive = ConferencesInactive::find($id);
        $conferencesInactive->access_type = 0;
        // var_dump($conferencesInactive->access_type);
        $conferencesInactive->save();
    }
    public function unique_multidim_array2($array, $key)
        {
            // tymczasowa tablica dla całej tablicy
            $temp_array = array();
            $i = 0;
            // tymczasowa tablica dla emaili
            $key_array = array();       
            
            foreach ($array as $val) {    
                $start_date=strtotime($val["start_date"]);
                $end_date=strtotime($val["end_date"]);
                
                if(($end_date - $start_date)> 440){

                    // echo  "</br>";
                    // echo  $end_date - $start_date;
                    // printr($interval);
                    // echo $start_date." end-> " .$end_date." | ". ($end_date - $start_date)."  </br>";
                    // jesli dany email nie znajduje sie w tymczasowaej tablicy obiektow wtedy dodaj ten obiekt do tablicy temp_array i dana watrosc umiesc w key_array
                        if (!in_array($val[$key], $key_array)) {
                            $key_array[$i] = $val[$key];
                            $temp_array[$i] = $val;
                            $temp_array[$i]['czas'] =($end_date - $start_date)/60 ;
                        }
                        $i++;
                }
                
                }
         
            // print_r($array);
            return $temp_array;
        }
    public function update2($room_id, $session_id)
    {
        $client2 = new ClickMeetingRestClient(array('api_key' => env('CM_KEY')));
        
        try {
            $session2 = $client2->conferenceSession($room_id, $session_id);
            // $this->conferences_arr[$room_id]['total_visitors']= $session->max_visitors;    
                            
            $datap['$session->attendees']= $session2->attendees;
            $stdClass = json_decode(json_encode($session2->attendees), true);   
            
            return $this->unique_multidim_array2($stdClass,'email');
            // $this->conferences_arr[$room_id]["attendees"] = $attendees;
          
        } catch (Exception $e) {
            echo '<pre>';
            print_r($e);
            echo  '</pre>';
        }
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
    public function updateClickMetting()
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
                
                $ca->room_url = $conference->room_url;
                $ca->phone_presenter_pin = $conference->phone_presenter_pin;
                $ca->phone_listener_pin = $conference->phone_listener_pin;
                $ca->embed_room_url = $conference->embed_room_url;
                $ca->widgets_hash = $conference->widgets_hash;
         
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

            
            $ca->room_url = $conference->room_url;
            $ca->phone_presenter_pin = $conference->phone_presenter_pin;
            $ca->phone_listener_pin = $conference->phone_listener_pin;
            $ca->embed_room_url = $conference->embed_room_url;
            $ca->widgets_hash = $conference->widgets_hash;
           
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
