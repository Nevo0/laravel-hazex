<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use function App\Http\Controllers\allUser;
use App\Http\Controllers\InactiveController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\IinactiveController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ConferencesController;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Resources\Session as SessionResource;
use App\Http\Controllers\IinactivesessionController;
use App\Http\Controllers\ConferencesActiveController;
use App\Http\Controllers\ConferencesInactiveController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/clear-cache', function () {
//     Artisan::call('cache:clear');
//     return "Cache is cleared";
// });




Route::get('/2', function () {
    $datap['name'] = "Rafal";
    $datap['chanel'] = "YouTube";

    return view('.user.home', compact('datap'));
});

// https://www.youtube.com/watch?v=MFh0Fd7BsjE&ab_channel=TraversyMedia

Route::get('/', function(){
    $user=[
'name'=> 'rafal',
'adress'=> [
    'line1'=>'Iwiny 51'
        ]
];
// destruktyryzacja tablicy
[
    'name'=> $name,
    'adress'=> ['line1'=>$adressLine1]
]= $user;
// echo "xxx";
$url= parse_url('https://hazex.eu/link/costa/');
// $url= parse_url('https://hazex.eu/link/costa/xxx?query=xxx');

// mozemy zdestrukturyzować tablice nawet jesli nie ma query w tablicy
// musimy przypisać dommyślna wartość do wartości query
['query'=> $queryLink]= array_merge(['query'=> 'null'],parse_url('https://hazex.eu/link/costa/asd')) ;
['query'=> $queryLink]= parse_url('https://hazex.eu/link/costa/asd?a=1')+ ['query'=> 'null'] ;


dump($name, $adressLine1, $url, $queryLink);
return view('home');
})->name('homes');

Route::get('/dashboard', [DashboardController::class, 'index'])
->name('dashboard');
// ->middleware('auth');
// middleware
// https://youtu.be/MFh0Fd7BsjE?t=3503


Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
// https://youtu.be/MFh0Fd7BsjE?t=3278

Route::get('/posts', [PostController::class, 'index'])->name('posts');
// https://youtu.be/MFh0Fd7BsjE?t=4016
Route::post('/posts', [PostController::class, 'store']);





Route::get('/user/create', [UserController::class, 'createUser']);
Route::post('/user/create', [UserController::class, 'seveUser'])->name('createuser');
// xxx
Route::get('/user/{iduser}', [UserController::class, 'idUser']);
Route::get('/cm', [ConferencesController::class, 'index']);
Route::get('/cm/a', [ConferencesActiveController::class, 'index']);
Route::get('/cm/n', [ConferencesInactiveController::class, 'index']);
Route::get('/cm/n/{id}', [ConferencesInactiveController::class, 'show'])->name('cn_id');
Route::get('/cm/check/a', [ConferencesActiveController::class, 'updateClickMetting']);
Route::get('/cm/check/n', [ConferencesInactiveController::class, 'updateClickMetting']);


Route::get('/cm/s/createAll', [IinactivesessionController::class, 'createAll']);
Route::get('/cm/s/{id}', [IinactivesessionController::class, 'show'])->name('sesion_cm_id');


