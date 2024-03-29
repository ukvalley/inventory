<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GpsAdmin\MAdminPanelController;


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


Route::get('/getUserType/{id}', [MAdminPanelController::class, 'getUserType'])->name('getUserType');


Route::get('/getCustomer/{id}', [MAdminPanelController::class, 'getCustomer'])->name('getCustomer');

Route::get('/getVehicle/{id}', [MAdminPanelController::class, 'getVehicle'])->name('getVehicle');



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
