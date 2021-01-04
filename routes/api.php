<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Resources\Session as SessionResource;
use App\Http\Controllers\ConferenceSessionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/sesioncm', [ConferenceSessionController::class, 'index']);
Route::get('/allactiveconferencs', [ConferenceSessionController::class, 'allactiveconferencs']);
Route::get('/sesioncm/{id}', [ConferenceSessionController::class, 'show']);
Route::post('/sesioncm/{id}', [ConferenceSessionController::class, 'store']);
Route::put('/sesioncm/{id}', [ConferenceSessionController::class, 'store']);
Route::delete('/sesioncm/{id}', [ConferenceSessionController::class, 'destroy']);








