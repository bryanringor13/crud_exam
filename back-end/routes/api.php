<?php

use App\Http\Controllers\PersonController;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::get('/person', [PersonController::class, 'index']);
Route::post('/person', [PersonController::class, 'create']);
Route::put('/person/{person}', [PersonController::class, 'update']);
Route::delete('/person/{person}', [PersonController::class, 'remove']);