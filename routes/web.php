<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\MAdminPanelController;

use App\Http\Controllers\SalesAgentController;

use App\Http\Controllers\OfficeController;

use App\Http\Controllers\TechnicianController;


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
// Route::get('/mail',[MAdminPanelController::class,'index']);


Route::get('/', function () {
    return view('index');
});


//
Route::get('/index', function () {
    return view('index');
});

Route::get('/madmin_panel', function () {
    return view('madmin_panel');
});



Route::get('/sales_agent_panel', function () {
    return view('sales_agent_panel');
});

Route::get('/technician_panel', function () {
    return view('technician_panel');
});







Route::get('/customer_table', function () {
    return view('customer_table');
});


Route::get('/login', function () {
    return view('login');
});






Route::get('/purchase_device', function () {
    return view('purchase_device');
});

Route::get('/purchase_table', function () {
    return view('purchase_table');
});





Route::get('/transaction', function () {
    return view('transaction');
});





Route::get('/user_table', function () {
    return view('user_table');
});
Route::get('/vehicle_table', function () {
    return view('vehicle_table');
});

Route::get('/device_table', function () {
    return view('device_table');
});

Route::get('/sales', function () {
    return view('sales');
});
Route::get('/sales_table', function () {
    return view('sales_table');
});
Route::get('/records', function () {
    return view('records');
});
Route::get('/records_table', function () {
    return view('records_table');
});
Route::get('/simtypes', function () {
    return view('simtypes');
});
Route::get('/sim_table', function () {
    return view('sim_table');
});



Route::get('/madmin_panel', [MAdminPanelController::class, 'madmin_panel'])->name('madmin_panel');


Route::get('/salesagent', [SalesAgentController::class, 'salesagent'])->name('salesagent');

Route::get('/office', [OfficeController::class, 'office'])->name('office');

Route::get('/technician_panel', [TechnicianController::class, 'technician'])->name('technician');




//customer--------------------------------------------------------------------------------
Route::post('/register_customer-post', [MAdminPanelController::class, 'CustomerRegister'])->name('CustomerRegister');

Route::post('/register_customer-update/{id}', [MAdminPanelController::class, 'update'])->name('update');


Route::get('customer_edit', [MAdminPanelController::class, 'customer_edit'])->name('customer_edit');
Route::get('destroy', [MAdminPanelController::class, 'destroy'])->name('destroy');


Route::get('/register_customer', [MAdminPanelController::class, 'register_customer'])->name('register_customer');


//vehicle-------------------------------------------------------------------------------------
Route::get('/register_vehicle', [MAdminPanelController::class, 'register_vehicle'])->name('register_vehicle');
Route::post('/register_vehicle-post', [MAdminPanelController::class, 'VehiclesRegister'])->name('VehiclesRegister');
Route::post('/register_vehicle-update/{id}', [MAdminPanelController::class, 'vehicle_update'])->name('vehicle_update');
Route::get('vehicle_edit', [MAdminPanelController::class, 'vehicle_edit'])->name('vehicle_edit');
Route::get('vehicle_destroy', [MAdminPanelController::class, 'vehicle_destroy'])->name('vehicle_destroy');

    


//User--------------------------------------------------------------------------------------

Route::get('/register_user', [MAdminPanelController::class, 'register_user'])->name('register_user');

Route::post('/register_user-post', [MAdminPanelController::class, 'UserRegister'])->name('UserRegister');
Route::post('/register_user-update/{id}', [MAdminPanelController::class, 'user_update'])->name('user_update');
Route::get('user_edit', [MAdminPanelController::class, 'user_edit'])->name('user_edit');
Route::get('user_destroy', [MAdminPanelController::class, 'user_destroy'])->name('user_destroy');


//devices--------------------------------------------------------------------------------------------------
Route::get('/add_device', [MAdminPanelController::class, 'add_sim'])->name('add_sim');

Route::post('/add_device-post', [MAdminPanelController::class, 'DeviceRegister'])->name('DeviceRegister');
Route::post('/add_device-update/{id}', [MAdminPanelController::class, 'device_update'])->name('device_update');
Route::get('device_edit', [MAdminPanelController::class, 'device_edit'])->name('device_edit');
Route::get('device_destroy', [MAdminPanelController::class, 'device_destroy'])->name('device_destroy');
Route::get('/register_sim', [MAdminPanelController::class, 'register_sim'])->name('register_sim');



//Purchase-------------------------------------------------------------------------------------------------------------------------
Route::get('/register_purchase', [MAdminPanelController::class, 'register_purchase'])->name('register_purchase');

Route::post('/purchase_device-post', [MAdminPanelController::class, 'PurchaseDevice'])->name('PurchaseDevice');
Route::post('/purchase_device-update/{id}', [MAdminPanelController::class, 'purchase_update'])->name('purchase_update');
Route::get('purchase_edit', [MAdminPanelController::class, 'purchase_edit'])->name('purchase_edit');
Route::get('purchase_destroy', [MAdminPanelController::class, 'purchase_destroy'])->name('purchase_destroy');

//SAles-------------------------------------------------------------------------------------------------------------------------
Route::get('/register_sales', [MAdminPanelController::class, 'register_sales'])->name('register_sales');
Route::post('/sales-post', [MAdminPanelController::class, 'Sales'])->name('Sales');
Route::post('/sales-update/{id}', [MAdminPanelController::class, 'sales_update'])->name('sales_update');
Route::get('sales_edit', [MAdminPanelController::class, 'sales_edit'])->name('sales_edit');
Route::get('sales_destroy', [MAdminPanelController::class, 'sales_destroy'])->name('sales_destroy');

//Records----------------------------------------------------------------------------------------------------------------------

Route::post('/records-post', [MAdminPanelController::class, 'Records'])->name('Records');

//SIM 


Route::post('/simtypes-post', [MAdminPanelController::class, 'SimTypes'])->name('SimTypes');

Route::post('/simtypes-update/{id}', [MAdminPanelController::class,'sim_update'])->name('sim_update');
Route::get('sim_edit', [MAdminPanelController::class, 'sim_edit'])->name('sim_edit');
Route::get('sim_destroy', [MAdminPanelController::class, 'sim_destroy'])->name('sim_destroy');



//Excel

Route::get('/excel', function () {
    return view('excel');
});

Route::get('/export-device', [MAdminPanelController::class, 'exportDevice'])->name('export-device');

