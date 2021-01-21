<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\User as ModelsUser;

use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use App\Models\ConferencesActive;
use Illuminate\Http\Request;
use App\Http\Controllers\ClickMeetingRestClient;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ConferencesInactiveController ;

class DailyQuote extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quote:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Respectively send an exclusive quote to everyone daily via email.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        $quotes = [
            'Mahatma Gandhi' => 'Live as if you were to die tomorrow. Learn as if you were to live forever.',
            'Friedrich Nietzsche' => 'That which does not kill us makes us stronger.',
            'Theodore Roosevelt' => 'Do what you can, with what you have, where you are.',
            'Oscar Wilde' => 'Be yourself; everyone else is already taken.',
            'William Shakespeare' => 'This above all: to thine own self be true.',
            'Napoleon Hill' => 'If you cannot do great things, do small things in a great way.',
            'Milton Berle' => 'If opportunity doesn’t knock, build a door.'
        ];
        function updateClickMetting()
    {
        
            $client = new ClickMeetingRestClient(array('api_key' => 'euae09e84abcf50d1bda5aad3f6a8dc37d310bab32'));
        try {
            DB::table('conferences_actives')->delete();
            $conferences = $client->conferences('active');
        } catch (\Throwable $th) {
            Log::info("error");
            return;
        }
        $datap = [];
        $datap['ConferencesActive'] = ConferencesActive::get();
       
      
        foreach ($conferences as $key => $conference) {
            $is = ConferencesActive::where('id_cm', $conference->id)->first();
            
            
            
            if ($is == null) {
                $datap["id"] = $is;
                $datap["conference->id"] = $conference->id;
                $datap["conference->name"] = $conference->name;
                // dump($datap);           
           
      
            $ca= new ConferencesActive;
            $ca->id_cm = $conference->id;
            $ca->room_type = $conference->room_type;
            $ca->room_pin = $conference->room_pin;
            $ca->name = $conference->name;
            $ca->name_url = $conference->name_url;
            if (!empty($conference->starts_at)) {
                // echo $conference->starts_at;
                
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
            }
        }       
        Log::info('Successfully get meeting '); 
        // Log::info('Wait on'. $czas);

    }
        // Setting up a random word
        $key = array_rand($quotes);
        $data = $quotes[$key];
        $czas=date("H:i");       

        if ($czas == "10:06"){
            updateClickMetting();
            
            
        }
        if ($czas == "11:05"){
            updateClickMetting();
            
        }
        if ($czas == "13:05"){
            updateClickMetting();
            
        }

        if ($czas == "15:05"){
            updateClickMetting();
            
        }
        if ($czas == "03:05"){
            updateClickMetting();
            
            
        }
        $conferencesInactiveController = new ConferencesInactiveController();
        $conferencesInactiveController->updateClickMetting();
        $conferencesInactiveController->send_to_SM_visitors_witch_tag();

        // Log::info('Wait on'. $czas);
        $this->info(env('CM_KEY'));
        // $this->info($czas);
        // Log::info($data);
        
    }
}
