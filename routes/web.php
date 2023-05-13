<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

use App\Http\Controllers\Controller;

//Admin
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;




//Welcome file
Route::get('/', function () {
    return view('users.welcome');
});


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

Route::get('user',[UserController::class,'index']);

Route::post('user/auth',[UserController::class,'auth'])->name('user.auth');




//sales search
Route::get('/device_sales/action', [SearchController::class, 'sales_action']);



