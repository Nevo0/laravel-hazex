<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\UserController;
use function App\Http\Controllers\allUser;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ConferencesController;

use App\Http\Controllers\Auth\RegisterController;
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
