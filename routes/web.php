<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;


//Admin
use App\Http\Controllers\AdminController;

use App\Http\Controllers\MAdminPanelController; 
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SimController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\SalesOrderController;
use App\Http\Controllers\RecordsController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ManifacturerController;



//sales search
Route::get('/device_sales/action', [SearchController::class, 'sales_action']);



//***********ADMIN************* */

Route::get('admin',[AdminController::class,'index']);


Route::get('admin/forget_password', function () {
    return view('admin/forget_password');
});

Route::get('admin/resetpassword', function () {
    return view('admin/resetpassword');
});

//

Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');



//************************************************************************* */
//User Start

Route::get('user',[UserController::class,'index']);

Route::post('user/auth',[UserController::class,'auth'])->name('user.auth');
