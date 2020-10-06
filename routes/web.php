<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


use function App\Http\Controllers\allUser;

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

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('/2', function () {
    $datap['name'] = "Rafal";
    $datap['chanel'] = "YouTube";

    return view('.user.home', compact('datap'));
});
Route::get('/', [UserController::class, 'allUsers']);
Route::get('/user/create', [UserController::class, 'createUser']);
Route::post('/user/create', [UserController::class, 'seveUser'])->name('createuser');
Route::get('/user/{iduser}', [UserController::class, 'idUser']);
