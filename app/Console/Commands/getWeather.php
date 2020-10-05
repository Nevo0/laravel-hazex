<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
//API pogodowe
use Cmfcmf\OpenWeatherMap;
use Cmfcmf\OpenWeatherMap\Exception as OWMException;
use Http\Factory\Guzzle\RequestFactory;
use GuzzleHttp\Psr7;
use GuzzleHttp\Client;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;

//dostęp do pamięci cache
use Illuminate\Support\Facades\Cache;

//biblioteka narzędzi date/time
use Illuminate\Support\Carbon;

class getWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getWeather:current';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pobiera bieżące dane pogodowe.';

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
    public function handle() { 

        $api_key="1a5a29e560798ffa7156da177c8b5cd0";
        $lang = 'pl'; 
        $units = 'metric';
        $days= 2;
        $krakow=3094802;
       
$httpRequestFactory = new RequestFactory();
$httpClient = new Client([]);

$owm = new OpenWeatherMap($api_key, $httpClient, $httpRequestFactory);


//czy w cache są poprzednie dane? jeżeli tak, to pobieramy
$pogoda = Cache::has('pogoda') ? Cache::get('pogoda') : array(); 

// Stan powietrza
// $data = @file_get_contents("http://api.gios.gov.pl/pjp-api/rest/aqindex/getIndex/config('constants.ID_STACJI_POMIAROWEJ')"); //pobieramy dane z serera GIOS
// if ($data) {
//     $air = json_decode($data); //poszło OK, dekodujemy do obiektu
// } else { //uwaliło się, poinformujmy o tym w logu
//     $air = null;
//     echo Carbon::now() . "\t" . 'Bład pobierania danych o stanie powietrza' . PHP_EOL;
// }

// Dane pogodowe
try {
    $current = $owm->getWeather($krakow, $units, $lang); //pobieramy aktualne dane dla miasta z id=OPENWEATHER_CITY_ID
    $forecast = $owm->getWeatherForecast($krakow, $units, $lang, '', $days); //pobieramy prognozę na dwa najbliższe dni dla miasta z id=OPENWEATHER_CITY_ID
} catch (OWMException $e) { //lipa, coś się nie udało
    echo Carbon::now() . "\t" . 'OpenWeatherMap exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').' . PHP_EOL;
} catch (Exception $e) { //lipa, ale poważniejsza
    echo Carbon::now() . "\t" . 'General exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').' . PHP_EOL;
}


if ($current) { //mamy to! sprawdzamy aktualną pogodę
    // Dzisiaj
    if (@getimagesize('http:' . $current->weather->getIconURL())) { //sztuczka magiczna - sprawdzam, czy dostarczona nazwa pliku ikony jest powiązana z fizycznym plikiem
        $pogoda['today'] = $current; //uff, wszytsko jest ok, zapisujemy w tablicy
    }
}
// dd($forecasts->rewind());

if ($forecast) { //mamy to! sprawdzamy prognozę na jutro
    $forecast->rewind(); //ustawiamy na dzisiaj
    $forecast->next(); //ustawiamy na kolejnej pozycji (jutro)
    $tommorow = $forecast->current(); //pobieramy jutrzejsze dane
    // dalej to samo, co powyżej
    if (@getimagesize('http:' . $tommorow->weather->getIconURL())) {
        $pogoda['tommorow'] = $tommorow;
    }
}

// Stan powietrza
// if ($air && $air->stIndexLevel->id >= 0) { // ignorujemy dla id<0 - to oznacza brak danych
//     $pogoda['air'] = $air;
// }

// Dane do cache
Cache::forget('pogoda'); //usuwamy poprzednie
Cache::forever('pogoda', $pogoda); //nowe zapisujemy na zawsze
// dd($forecast);

}

}