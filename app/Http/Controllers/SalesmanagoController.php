<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SalesmanagoController extends Controller
{



      public function tag_send_to_SM($event){

        if ($event=="ochrona-urzadzen-i-aparatow-przed-skutkami-wybuchu-pylow") {
          $event= "WEBINAR_ATEX_ZABEZPIECZENIA_UCZESTNIK";
        }
        if ($event=="poprawny-dobor-zabezpieczen-przeciwwybuchowych-dla-jednostek-odpylajacych") {
          $event= "WEBINAR_ATEX_ODPYLANIE_UCZESTNIK";
        }
        if ($event=="oswietlenie-podstawowe-i-awaryjne-w-strefach-zagrozenia-wybuchem") {
          $event= "WEBINAR_ATEX_OSWIETLENIE_UCZESTNIK";
        }
        if ($event=="awaryjne-oswietlenie-ewakuacyjne-i-zapasowe-a-prawo-i-normy-a") {
          $event= "WEBINAR_ATEX_OSWIETLENIE_PRAWO_UCZESTNIK";
        }
        if ($event=="wyladowania-elektrostatyczne-jako-przyczyna-wybuchu-jak-sie-chronic") {
          $event= "WEBINAR_ATEX_WYLADOWANIA_UCZESTNIK";
        }
        if ($event=="wyladowania-elektrostatyczne-jako-przyczyna-wybuchu-jak-sie-ochronic") {
          $event= "WEBINAR_ATEX_WYLADOWANIA_UCZESTNIK";
        }
        // awaryjne-oswietlenie-ewakuacyjne-i-zapasowe-a-prawo-i-normy-a
        return $event;
        }


      public function process_contact_form_sm2( $AREQUEST,$url, $data_start ){
          $attend = $AREQUEST;
          // $attend = array("email"=> "pi@pi.pl", "name"=> "Pi", "company"=> "Pi", "phone"=> "555");
          // $arr = array('a' => "1", 'b' => "2", 'c' => 3, 'd' => 4, 'e' => 5);
          // $attend = array(["czas"=> "2820",
          // "email"=> "piecyk.wolff@gmail.com",
          // "end_date"=> "2020-07-23T11:50:00+02:00",
          // "id"=> "46247414",
          // "login"=> "RAFAŁ PiECyk;Wolff;888",
          // "start_date"=> "2020-07-23T11:03:00+02:00"],
          // ["czas"=> "2820",
          // "email"=> "2gruszkakrk@gmail.com",
          // "end_date"=> "2020-07-23T11:50:00+02:00",
          // "id"=> "46247414",
          // "login"=> "SEAstian GruszKA;Wolff;888",
          // "start_date"=> "2020-07-23T11:03:00+02:00"]);



          $type =gettype($attend);
          $atte=[];
          foreach ($attend as $key => $value) {

            if ("action" == $key || 'data' == $key || 'name_url' == $key  ) {

              array_push($atte,$key);
              $api_response_bod ='magia2';

                unset($attend[$key]);
            }
          }
          $upsertDetails= [];
        //   array_push($attend,$_REQUEST[0]);

          $event=$this->tag_send_to_SM($url);



            foreach ($attend as $key => $value) {

              $details["email"]= $value['email'];
              // $details["login"]= $value['login'];
              $dataPerson = explode(";", $value['login']);
            //   dump($dataPerson);
            //   return;
              // $details["dataPerson"]= $dataPerson;
              $details["name"]= isset($dataPerson[0]) ? $dataPerson[0]: "";
              $details["company"]= isset($dataPerson[1]) ? $dataPerson[1] : "";
              $details["phone"]= isset($dataPerson[2]) ? $dataPerson[2] : "";
              array_push($upsertDetails, $details);
            }

          // $upsertDetails= $upsertDetails[0]['email'];

          $json2= $this->prepe_json_to_send($upsertDetails, $event, $data_start);
        //   dump($json2);
        //   dump($upsertDetails);
        //   dump($event);

        $this->send_tag_to_sm($json2 ,$_REQUEST);


            // dump([ $_REQUEST,$attend, $upsertDetails,$atte]);
      }
      public function prepe_json_to_send($upsertDetails, $event= "WEBINAR_NIEZNANY" , $data_start= "DATA_NIEZNANA"){

        $json2 = "{\"apiKey\": \"asfwer234ytrfd\",\"clientId\": \"pl00klu6ty2v242x\",\"requestTime\": 1579771574,\"sha\": \"74710087e86a363f92ffdbe6e9c21153a727e0a5\",\"owner\": \"s.gruszka@grupa-wolff.eu\",\"upsertDetails\":[";
          $numItems = count($upsertDetails);
          $i = 0;
          foreach($upsertDetails as $key => $value){

            $json2 .= '{"newEmail": null,"contact": {"email": "'.$value['email'].'"},"tags": ["'.$event .'_'. $data_start .'","'.$event.'"]}';
             if(!(++$i === $numItems)) {
              $json2 .=',';
            }
          }
          $json2 .= "]}";
      return  $json2;
    }
    public function send_tag_to_sm($json){
        // dump($json);
        // return "send_tag_to_sm";
        try {
          $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => "https://app2.salesmanago.pl/api/contact/batchupsert",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "$json",
            CURLOPT_COOKIE => "SERVERID=L",
            CURLOPT_HTTPHEADER => array(
              "accept: application/json",
              "content-type: application/json"
            ),
          ));

          $response = curl_exec($curl);
          $err = curl_error($curl);

          curl_close($curl);

          if ($err) {
            dump([$err,$json]);
            // write_log($err);
            Log::info(["if (err)",$err,$json]);
          } else {
            $response_json=json_decode($response);

            $contactIds=json_encode($response_json->contactIds);
            $invalidContacts=json_encode($response_json->invalidContacts);

          echo "dodane";
            // dump([ $contactIds, $invalidContacts]);
            Log::info([ "response_json",$contactIds, $invalidContacts]);
            // write_log($response_json);
            return "1";
          }

        } catch (\Throwable $th) {
          Log::info(["Throwable",$th]);
          // write_log($th);
        }

        // dump([$attend,$json]);

      }
}
