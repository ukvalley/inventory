<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\MAdminPanelController;


//new
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SimController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\RecordsController;
use App\Http\Controllers\TransactionController;





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










Route::get('/customer/customer_table', function () {
    return view('customer/customer_table');
});




Route::get('/login', function () {
    return view('login');
});






Route::get('purchase/purchase_device', function () {
    return view('purchase/purchase_device');
});

Route::get('purchase/purchase_table', function () {
    return view('purchase/purchase_table');
});


Route::get('user/user_table', function () {
    return view('user/user_table');
});
Route::get('vehicle/vehicle_table', function () {
    return view('vehicle/vehicle_table');
});

Route::get('device/device_table', function () {
    return view('device/device_table');
});

Route::get('sale/sales_table', function () {
    return view('sale/sales_table');
});
Route::get('/records', function () {
    return view('records');
});
Route::get('records/records_table', function () {
    return view('records/records_table');
});

Route::get('sim/sim_table', function () {
    return view('sim/sim_table');
});

//old

//New Routes
//*************************************************************************************************************** */

//customer--------------------------------------------------------------------------------
Route::post('/register_customer-post', [CustomerController::class, 'CustomerRegister'])->name('CustomerRegister');
Route::post('/register_customer-update/{id}', [CustomerController::class, 'update'])->name('update');


Route::get('customer/customer_edit', [CustomerController::class, 'customer_edit'])->name('customer_edit');
Route::get('destroy', [CustomerController::class, 'destroy'])->name('destroy');
Route::get('/customer/register_customer', [CustomerController::class, 'register_customer'])->name('register_customer');


//vehicle-------------------------------------------------------------------------------------
Route::get('vehicle/register_vehicle', [VehicleController::class, 'register_vehicle'])->name('register_vehicle');
Route::post('/register_vehicle-post', [VehicleController::class, 'VehiclesRegister'])->name('VehiclesRegister');
Route::post('/register_vehicle-update/{id}', [VehicleController::class, 'vehicle_update'])->name('vehicle_update');
Route::get('vehicle/vehicle_edit', [VehicleController::class, 'vehicle_edit'])->name('vehicle_edit');
Route::get('vehicle_destroy', [VehicleController::class, 'vehicle_destroy'])->name('vehicle_destroy');



//User--------------------------------------------------------------------------------------

Route::get('user/register_user', [UserController::class, 'register_user'])->name('register_user');
Route::post('/register_user-post', [UserController::class, 'UserRegister'])->name('UserRegister');
Route::post('/register_user-update/{id}', [UserController::class, 'user_update'])->name('user_update');
Route::get('user/user_edit', [UserController::class, 'user_edit'])->name('user_edit');
Route::get('user_destroy', [UserController::class, 'user_destroy'])->name('user_destroy');


//devices--------------------------------------------------------------------------------------------------

// Route::get('add_device', [DeviceController::class, 'add_sim'])->name('add_sim');

Route::get('device/add_device',[DeviceController::class, 'add_device'])->name('add_device');

Route::post('/add_device-post',[DeviceController::class, 'DeviceRegister'])->name('DeviceRegister');
Route::post('/add_device-update/{id}', [DeviceController::class, 'device_update'])->name('device_update');
Route::get('device/device_edit',[DeviceController::class, 'device_edit'])->name('device_edit');
Route::get('device_destroy',[DeviceController::class, 'device_destroy'])->name('device_destroy');

Route::get('device_edit',[DeviceController::class, 'add_sim'])->name('add_sim');



//Purchase-------------------------------------------------------------------------------------------------------------------------
Route::get('purchase/register_purchase',[PurchaseController::class, 'register_purchase'])->name('register_purchase');
Route::post('/purchase_device-post', [PurchaseController::class, 'PurchaseDevice'])->name('PurchaseDevice');
Route::post('/purchase_device-update/{id}', [PurchaseController::class, 'purchase_update'])->name('purchase_update');
Route::get('purchase/purchase_edit', [PurchaseController::class, 'purchase_edit'])->name('purchase_edit');
Route::get('purchase_destroy', [PurchaseController::class, 'purchase_destroy'])->name('purchase_destroy');

//SAles-------------------------------------------------------------------------------------------------------------------------
Route::get('/sale/register_sales', [SalesController::class, 'register_sales'])->name('register_sales');
Route::post('/sales-post', [SalesController::class, 'Sales'])->name('Sales');
Route::post('/sales-update/{id}', [SalesController::class, 'sales_update'])->name('sales_update');
Route::get('/sale/sales_edit', [SalesController::class, 'sales_edit'])->name('sales_edit');
Route::get('sales_destroy', [SalesController::class, 'sales_destroy'])->name('sales_destroy');

//Records----------------------------------------------------------------------------------------------------------------------

Route::post('/records-post', [RecordsController::class, 'Records'])->name('Records');

//SIM 
Route::get('sim/register_sim', [SimController::class, 'register_sim'])->name('register_sim');

Route::get('/sim/simtypes', [SimController::class, 'add_sim'])->name('add_sim');

Route::post('/simtypes-post', [SimController::class, 'SimTypes'])->name('SimTypes');
Route::post('/simtypes-update/{id}', [SimController::class,'sim_update'])->name('sim_update');
Route::get('sim/sim_edit', [SimController::class, 'sim_edit'])->name('sim_edit');
Route::get('sim_destroy', [SimController::class, 'sim_destroy'])->name('sim_destroy');
Route::get('sim/simtypes', [SimController::class, 'add_simtype'])->name('add_simtype');

//
//changes
//device
Route::get('add_device', [DeviceController::class, 'add_sim'])->name('add_sim');


//Records Table

Route::post('/register_records-post', [RecordsController::class, 'Records']);
Route::post('/register_records-update/{id}', [RecordsController::class, 'records_update']);
Route::get('records_destroy', [RecordsController::class, 'records_destroy'])->name('records_destroy');
Route::get('/add_user', [RecordsController::class, 'add_user'])->name('add_user');

 

//purchaseOrder


Route::get('/purchaseOrderForm', function () {  
    return view('purchaseOrderForm');
});

Route::get('/salesOrderForm', function () {  
    return view('salesOrderForm');
});

Route::post('purchaseformPost', [PurchaseOrderController::class, 'purchaseformPost'])->name('purchaseformPost');

Route::get('/purchaseForm', [PurchaseOrderController::class, 'purchaseForm'])->name('purchaseForm');

//sales
Route::post('salesformPost', [SalesOrderController::class, 'salesformPost'])->name('salesformPost');


//csv imports


Route::get('getImport', [MAdminPanelController::class, 'getImport'])->name('import');
Route::post('/import_parse', [MAdminPanelController::class, 'parseImport'])->name('import_parse');
Route::post('/import_process', [MAdminPanelController::class, 'processImport'])->name('import_process');


//Transfer Device


Route::get('transfer', [MAdminPanelController::class, 'get_device'])->name('get_device');
Route::post('transferUpdate', [MAdminPanelController::class, 'transferUpdate'])->name('transferUpdate');





Route::get('getUserType', [MAdminPanelController::class, 'getUserType'])->name('getUserType');

//sale device


Route::get('device_sale', [MAdminPanelController::class, 'getCustomer'])->name('device_sale');

Route::get('getCustomer', [MAdminPanelController::class, 'getCustomer'])->name('getCustomer');


Route::post('saleUpdate', [MAdminPanelController::class, 'saleUpdate'])->name('saleUpdate');
Route::get('get_customer', [MAdminPanelController::class, 'get_customer'])->name('get_customer');



//transcaction genaration

Route::get('/transaction/transaction_table', function () {
    return view('transaction/transaction_table');
});

Route::get('/transaction/transaction', [TransactionController::class, 'register_sales'])->name('register_sales');
