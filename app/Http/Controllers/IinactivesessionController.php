<?php

namespace App\Http\Controllers;

use App\Models\Iinactive;
use Illuminate\Http\Request;
use App\Models\Iinactivesession;

class IinactivesessionController extends Controller
{
    public function show($id)
    {
        $client = new ClickMeetingRestClient(array('api_key' => env('CM_KEY')));

        $datap[0]=[$id];
        $datap['IinactiveControllerAPI']=[];

        $datap['IinactiveController'] = Iinactivesession::orderByDesc('starts_at')->paginate(12);
        // $datap['IinactiveController'] = $datap['IinactiveController']->toJson();
        $datap['IinactiveController'] = $datap['IinactiveController']->toArray();
        // $datap['IinactiveController'] = IinactiveController::select('id_cm','room_type','room_pin','name','name_url',)->get()->attributesToArray();
        // $room_id= 4346625;
        // $datap['sessions'] = $client->conferenceSessions($room_id);
        // $session_id=  $datap['sessions'][0]->id;
        // $datap['session'] = $client->conferenceSession($room_id, $session_id);
        $datap['sessions'] = $client->conferenceSessions($id);
        dump($datap);
        return view('cm.list3', compact('datap'));
    }
    public function createAll()
    {
        $client = new ClickMeetingRestClient(array('api_key' => env('CM_KEY')));

        $datap['Iinactive']=Iinactive::get()->toArray();
        $datap['Iinactive_one']= $datap['Iinactive'][0]['idcm'];

        // $table->id();
        // $table->integer('idsession');
        // $table->foreignId('iinactives_idcm')->constrained()->onDelete('cascade');
        // $table->string('total_visitors')->nullable();
        // $table->string('max_visitors')->nullable();
        // $table->date('start_date')->nullable();
        // $table->date('end_date')->nullable();
        // $table->json('attendees')->nullable();
        // $table->json('pdf')->nullable();
        // $table->timestamps();
        $datap['sessions'] = $client->conferenceSessions($datap['Iinactive_one']);
        $datap['sessions2']=$datap['sessions'][0];
        // $datap['id'] = $datap['sessions2']['id'];
        // $datap['s']['total_visitors']= $datap['sessions']['total_visitors'];
        // $datap['s']['max_visitors']= $datap['sessions']['max_visitors'];
        // $datap['s']['start_date']= $datap['sessions']['start_date'];
        // $datap['s']['end_date']= $datap['sessions']['end_date'];
        dump($datap);
        foreach ($datap['Iinactive'] as $key => $value) {
            echo $value["idcm"]. "<br/>";
        }

        return view('cm.list3', compact('datap'));
    }
}
