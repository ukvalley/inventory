<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users;




//Admin
use App\Http\Controllers\Users\AdminController;

use App\Http\Controllers\Users\MAdminPanelController; 
use App\Http\Controllers\Users\Controller;
use App\Http\Controllers\Users\DashboardController;
use App\Http\Controllers\Users\CustomerController;
use App\Http\Controllers\Users\VehicleController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Users\DeviceController;
use App\Http\Controllers\Users\SalesController;
use App\Http\Controllers\Users\SimController;
use App\Http\Controllers\Users\PurchaseController;
use App\Http\Controllers\Users\PurchaseOrderController;
use App\Http\Controllers\Users\SalesOrderController;
use App\Http\Controllers\Users\RecordsController;
use App\Http\Controllers\Users\TransactionController;
use App\Http\Controllers\Users\SearchController;
use App\Http\Controllers\Users\ManifacturerController;



//USER GROUP MIDDLEWARE
Route::group(['prefix' => 'user', 'middleware' => ['is_user']], function(){

    
    Route::get('/Userdashboard',[Users\Controller::class,'UserDashboard']);
    Route::get('/logout',[Users\UserController::class,'logout']);
    Route::get('profile', [Users\Controller::class, 'profile'])->name('profile');




    Route::get('/customer/register_customer', [Users\CustomerController::class, 'register_customer'])->name('register_customer');
    Route::post('/register_customer-post', [Users\CustomerController::class, 'CustomerRegister'])->name('CustomerRegister');
    Route::post('/register_customer-update/{id}', [Users\CustomerController::class, 'update'])->name('update');


    Route::get('customer/customer_edit', [Users\CustomerController::class, 'customer_edit'])->name('customer_edit');
    Route::get('destroy', [Users\CustomerController::class, 'destroy'])->name('destroy');

    Route::get('/customer/customer_table',[Users\CustomerController::class,'customer_view'])->name('customer_view');
     


});