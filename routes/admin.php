<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GpsAdmin;


//Admin
use App\Http\Controllers\GpsAdmin\AdminController;

use App\Http\Controllers\GpsAdmin\MAdminPanelController; 
use App\Http\Controllers\GpsAdmin\Controller;
use App\Http\Controllers\GpsAdmin\DashboardController;
use App\Http\Controllers\GpsAdmin\CustomerController;
use App\Http\Controllers\GpsAdmin\VehicleController;
use App\Http\Controllers\GpsAdmin\UserController; 
use App\Http\Controllers\GpsAdmin\DeviceController;
use App\Http\Controllers\GpsAdmin\SalesController;
use App\Http\Controllers\GpsAdmin\SimController;
use App\Http\Controllers\GpsAdmin\PurchaseController;
use App\Http\Controllers\GpsAdmin\PurchaseOrderController;
use App\Http\Controllers\GpsAdmin\SalesOrderController;
use App\Http\Controllers\GpsAdmin\RecordsController;
use App\Http\Controllers\GpsAdmin\TransactionController;
use App\Http\Controllers\GpsAdmin\SearchController;
use App\Http\Controllers\GpsAdmin\ManifacturerController;



//************************************************************************* */
//Admin Start

///ADMIN GROUP MIDDLEWARE

//************************************************************************* */
Route::get('/device_sales/action', [SearchController::class, 'sales_action']);



    Route::group(['prefix' => 'admin', 'middleware' => ['is_admin']], function(){

        
    Route::get('/dashboard',[DashboardController::class,'dashboard']);
    Route::get('/logout',[AdminController::class,'logout']);

    Route::get('adminprofile', [DashboardController::class, 'adminprofile'])->name('adminprofile');




    Route::get('transaction1/transaction_table', [TransactionController::class, 'Transaction'])->name('Transaction');



Route::get('purchase/purchase_device', function () {
    return view('/purchase/purchase_device');
});



Route::get('purchase/purchase_table', function () {
    return view('/purchase/purchase_table');
});


Route::get('user/user_table', function () {
    return view('/user/user_table');
});
Route::get('vehicle/vehicle_table', function () {
    return view('/vehicle/vehicle_table');
});



Route::get('sale/sales_table', function () {
    return view('/sale/sales_table');
});
Route::get('/records', function () {
    return view('records');
});
Route::get('records/records_table', function () {
    return view('/records/records_table');
});

Route::get('sim/sim_table', function () {
    return view('/sim/sim_table');
});
    
//customer--------------------------------------------------------------------------------

Route::get('/customer1/register_customer', [CustomerController::class, 'register_customer'])->name('register_customer');

Route::post('/register_customer-post', [CustomerController::class, 'CustomerRegister'])->name('CustomerRegister');
Route::post('/register_customer-update/{id}', [CustomerController::class, 'update'])->name('update');
Route::get('customer1/customer_edit', [CustomerController::class, 'customer_edit'])->name('customer_edit');
Route::get('destroy', [CustomerController::class, 'destroy'])->name('destroy');
Route::get('customer1/customer_table',[CustomerController::class,'customer_view'])->name('customer_view');


//vehicle-------------------------------------------------------------------------------------
Route::get('vehicle/register_vehicle', [VehicleController::class, 'register_vehicle'])->name('register_vehicle');
Route::post('/register_vehicle-post', [VehicleController::class, 'VehiclesRegister'])->name('VehiclesRegister');
Route::post('/register_vehicle-update/{id}', [VehicleController::class, 'vehicle_update'])->name('vehicle_update');
Route::get('vehicle/vehicle_edit', [VehicleController::class, 'vehicle_edit'])->name('vehicle_edit');
Route::get('vehicle_destroy', [VehicleController::class, 'vehicle_destroy'])->name('vehicle_destroy');
Route::get('/vehicle/vehicle_table', [VehicleController::class, 'vehicle_table'])->name('vehicle_table');



//User--------------------------------------------------------------------------------------

Route::get('user/register_user', [UserController::class, 'register_user'])->name('register_user');
Route::post('/register_user-post', [UserController::class, 'UserRegister'])->name('UserRegister');
Route::post('/register_user-update/{id}', [UserController::class, 'user_update'])->name('user_update');
Route::get('user/user_edit', [UserController::class, 'user_edit'])->name('user_edit');
Route::get('user_destroy', [UserController::class, 'user_destroy'])->name('user_destroy');
Route::get('/user/user_table', [UserController::class, 'view_user'])->name('view_user');

//devices--------------------------------------------------------------------------------------------------

// Route::get('add_device', [DeviceController::class, 'add_sim'])->name('add_sim');

Route::get('device/add_device',[DeviceController::class, 'add_device'])->name('add_device');

Route::post('/add_device-post',[DeviceController::class, 'DeviceRegister'])->name('DeviceRegister');
Route::post('/add_device-update/{id}', [DeviceController::class, 'device_update'])->name('device_update');
Route::get('device/device_edit',[DeviceController::class, 'device_edit'])->name('device_edit');
Route::get('device_destroy',[DeviceController::class, 'device_destroy'])->name('device_destroy');
Route::get('device_edit',[DeviceController::class, 'add_sim'])->name('add_sim');
Route::get('/device1/device_table', [DeviceController::class, 'view_device'])->name('view_device');




//Purchase-------------------------------------------------------------------------------------------------------------------------
Route::get('purchase1/purchase_device',[PurchaseController::class, 'register_purchase'])->name('register_purchase');
Route::post('/purchase_device-post', [PurchaseController::class, 'PurchaseDevice'])->name('PurchaseDevice');
Route::post('/purchase_device-update/{id}', [PurchaseController::class, 'purchase_update'])->name('purchase_update');
Route::get('purchase/purchase_edit', [PurchaseController::class, 'purchase_edit'])->name('purchase_edit');
Route::get('purchase_destroy', [PurchaseController::class, 'purchase_destroy'])->name('purchase_destroy');
Route::get('/purchase1/purchase_table', [PurchaseController::class, 'view_purchase'])->name('view_purchase');

//SAles-------------------------------------------------------------------------------------------------------------------------
Route::get('/sale/register_sales', [SalesController::class, 'register_sales'])->name('register_sales');
Route::post('/sales-post', [SalesController::class, 'Sales'])->name('Sales');
Route::post('/sales-update/{id}', [SalesController::class, 'sales_update'])->name('sales_update');
Route::get('/sale/sales_edit', [SalesController::class, 'sales_edit'])->name('sales_edit');
Route::get('sales_destroy', [SalesController::class, 'sales_destroy'])->name('sales_destroy');
Route::get('/sale/sales_table', [SalesController::class, 'view_sales'])->name('view_sales');

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

Route::get('add_sim', [DeviceController::class, 'add_sim'])->name('add_sim');


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

Route::get('getImport', [PurchaseOrderController::class, 'getImport'])->name('import');
Route::post('import_parse_admin', [PurchaseOrderController::class, 'parseImport'])->name('import_parse_admin');

Route::post('import_process', [PurchaseOrderController::class, 'processImport'])->name('import_process');








Route::get('transfer', [MAdminPanelController::class, 'get_device'])->name('get_device');
Route::post('admintransferUpdate', [MAdminPanelController::class, 'admintransferUpdate'])->name('admintransferUpdate');


Route::get('getUserType', [MAdminPanelController::class, 'getUserType'])->name('getUserType');

//sale device


Route::get('device_sale', [MAdminPanelController::class, 'getCustomer'])->name('device_sale');
Route::get('getCustomer', [MAdminPanelController::class, 'getCustomer'])->name('getCustomer');
Route::post('saleUpdate', [MAdminPanelController::class, 'saleUpdate'])->name('saleUpdate');
Route::get('get_customer', [MAdminPanelController::class, 'get_customer'])->name('get_customer');
Route::get('getVehicle', [MAdminPanelController::class, 'getVehicle'])->name('getVehicle');




//transcaction genaration

Route::get('/transaction/transaction', [TransactionController::class, 'register_sales'])->name('register_sales');



///view for single id in table



Route::get('/device_info', [DeviceController::class, 'openDeviceInfo'])->name('openDeviceInfo');
Route::get('/customer_info', [CustomerController::class, 'openCustomerInfo'])->name('openCustomerInfo');
Route::get('/user_info', [UserController::class, 'openUserInfo'])->name('openUserInfo');
Route::get('/vehicle_info', [VehicleController::class, 'openVehicleInfo'])->name('openVehicleInfo');
Route::get('/purchase_info', [PurchaseController::class, 'openPurchaseInfo'])->name('openPurchaseInfo');
Route::get('/sales_info', [SalesController::class, 'openSalesInfo'])->name('openSalesInfo');



//reports and single id reports

Route::get('/report_device', [DeviceController::class, 'deviceReport'])->name('deviceReport');
Route::get('/reportById/{id}', [DeviceController::class, 'reportById'])->name('reportById');

//search ajax action 

Route::get('/transfer_transaction', [SearchController::class, 'index']);
Route::get('/transfer_transaction/action', [SearchController::class, 'action']);

//sales search


Route::get('/device_sales', [SearchController::class, 'sales_index']);
Route::get('/device_sales/action', [SearchController::class, 'sales_action']);

//manifacturer register edit delete

Route::get('/manifacturer1/manifacturer_table', function () {
return view('manifacturer/manifacturer_table');
});


Route::get('/manifacturer1/manifacturer', function () {  
return view('/manifacturer/manifacturer');
});
Route::post('register_manifacturer', [ManifacturerController::class, 'register_manifacturer'])->name('register_manifacturer');
Route::post('/manifacturer-post', [ManifacturerController::class, 'ManifacturerRegister'])->name('ManifacturerRegister');
Route::post('/manifacturer-update/{id}', [ManifacturerController::class, 'update'])->name('update');
Route::get('/manifacturer/manifacturer_edit', [ManifacturerController::class, 'manifacturer_edit'])->name('manifacturer_edit');
Route::get('destroy', [ManifacturerController::class, 'destroy'])->name('destroy');


  

///device accept and reject
Route::post('/device-transfers', [TransactionController::class, 'send']);

// Accept device transfer request
Route::post('/device-transfers/{action}', [TransactionController::class, 'accept']);

// Reject device transfer request
Route::put('/device-transfers/{transfer}/reject', [TransactionController::class, 'reject']);



  
    Route::get('/acceptdevice_table', [TransactionController::class, 'index'])->name('index');

    Route::get('/view_acceptdevice', [TransactionController::class, 'view_acceptdevice'])->name('view_acceptdevice');




///device accept and reject
Route::post('/device-transfers', [TransactionController::class, 'send']);

// Accept device transfer request
Route::put('/device-transfers/{transfer}/accept', [TransactionController::class, 'accept']);

// Reject device transfer request
Route::put('/device-transfers/{transfer}/reject', [TransactionController::class, 'reject']);



//-----------pdf Routes-------------
Route::get('/sale/salespdf', function () {
return view('/sale/salespdf');
});
//sales pdf
Route::get('pdfview', [SalesController::class, 'pdfview'])->name('pdfview');

//purchase pdf

Route::get('/purchase/purchasepdf', function () {
return view('/purchase/purchasepdf');
});
Route::get('pdfview_purchase', [PurchaseController::class, 'pdfview_purchase'])->name('pdfview_purchase');


//Transction pdf

Route::get('/transaction/transactionpdf', function () {
return view('/transaction/transactionpdf');
});

Route::get('pdfview_transaction', [TransactionController::class, 'pdfview_transaction'])->name('pdfview_transaction');

//device pdf

Route::get('/device/devicepdf', function () {
return view('/device/devicepdf');
});

Route::get('pdfview_device', [DeviceController::class, 'pdfview_device'])->name('pdfview_device');

//customer pdf
Route::get('/customer/customerpdf', function () {
return view('/customer/customerpdf');
});
Route::get('pdfview_customer', [CustomerController::class, 'pdfview_customer'])->name('pdfview_customer');

//vehicle pdf
Route::get('/vehicle/vehiclepdf', function () {
return view('/vehicle/vehiclepdf');
});
Route::get('pdfview_vehicle', [VehicleController::class, 'pdfview_vehicle'])->name('pdfview_vehicle');


//user pdf
Route::get('/user/userpdf', function () {
return view('/user/userpdf');
});
Route::get('pdfview_user', [UserController::class, 'pdfview_user'])->name('pdfview_user');


//Singel DeviceInfo pdf
Route::get('/device/device_infopdf', function () {
return view('/device/device_infopdf');
});
Route::get('/pdfview_device_info', [DeviceController::class, 'pdfview_device_info'])->name('pdfview_device_info');

});







