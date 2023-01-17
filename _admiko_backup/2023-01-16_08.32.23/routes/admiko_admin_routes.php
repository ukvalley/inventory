<?php
/** Admiko routes. This file will be overwritten on page import. Don't add your code here! **/

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

/**Customer**/
Route::delete("customer/destroy", [CustomerController::class,"destroy"])->name("customer.delete");
Route::resource("customer", CustomerController::class)->parameters(["customer" => "customer"]);
/**Vechicles**/
Route::delete("vechicles/destroy", [VechiclesController::class,"destroy"])->name("vechicles.delete");
Route::resource("vechicles", VechiclesController::class)->parameters(["vechicles" => "vechicles"]);
/**Users**/
Route::delete("users/destroy/{id?}", [UsersController::class,"destroy"])->name("users.delete");
Route::get("users/{id}/create", [UsersController::class,"create"])->name("users.create");
Route::post("users/{id}/store", [UsersController::class,"store"])->name("users.store");
Route::get("users/{id}/edit", [UsersController::class,"edit"])->name("users.edit");
Route::put("users/{id}/update", [UsersController::class,"update"])->name("users.update");
Route::get("users/{id?}", [UsersController::class,"index"])->name("users.index");
/**Device**/
Route::delete("device/destroy", [DeviceController::class,"destroy"])->name("device.delete");
Route::resource("device", DeviceController::class)->parameters(["device" => "device"]);
/**SimTypes**/
Route::delete("sim_types/destroy", [SimTypesController::class,"destroy"])->name("sim_types.delete");
Route::resource("sim_types", SimTypesController::class)->parameters(["sim_types" => "sim_types"]);
/**Purchase**/
Route::delete("purchase/destroy", [PurchaseController::class,"destroy"])->name("purchase.delete");
Route::resource("purchase", PurchaseController::class)->parameters(["purchase" => "purchase"]);
/**Sales**/
Route::delete("sales/destroy", [SalesController::class,"destroy"])->name("sales.delete");
Route::resource("sales", SalesController::class)->parameters(["sales" => "sales"]);
/**Records**/
Route::delete("records/destroy", [RecordsController::class,"destroy"])->name("records.delete");
Route::resource("records", RecordsController::class)->parameters(["records" => "records"]);
