<?php

use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\TableController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [LoginController::class, 'loginApi']);
Route::get('logout', [LoginController::class, 'logoutApi']);


Route::middleware('auth:sanctum')->group(function(){
    // Table api
    // get all tables
    Route::get("tables", "App\Http\Controllers\api\TableController@getTables");
    // get table by id
    Route::get("tables/{id}", "App\Http\Controllers\api\TableController@getTableById");
    // get table by status
    Route::get("tables/status/{status}", "App\Http\Controllers\api\TableController@getTableByStatus");
    // get table available by Capacity 
    Route::get("tables/available/{capacity}", "App\Http\Controllers\api\TableController@getTableAvailableByCapacity");
    // get table available by table number 
    Route::post("tables/available/{table_number}", "App\Http\Controllers\api\TableController@getTableAvailableByCapacityAndTableNumber");
    // get table by number table
    Route::get("tables/number/{number}", "App\Http\Controllers\api\TableController@getTableByNumber");
    
    // Reservation api
    // get all reservasi
    Route::get("reservations", "App\Http\Controllers\api\ReservationController@getReservations");
    // get reservasi by id
    Route::get("reservations/{id}", "App\Http\Controllers\api\ReservationController@getReservationById");
    // create reservasi
    Route::post("reservations", "App\Http\Controllers\api\ReservationController@createReservation");
// update reservasi
Route::put("reservations/{id}", "App\Http\Controllers\api\ReservationController@updateReservation");
// delete reservasi
Route::delete("reservations/{id}", "App\Http\Controllers\api\ReservationController@deleteReservation");
// get reservasi by user id
Route::get("reservations/user/{id}", "App\Http\Controllers\api\ReservationController@getReservationByUserId");
// get reservasi by table id
Route::get("reservations/table/{id}", "App\Http\Controllers\api\ReservationController@getReservationByTableId");
// get reservasi by status
Route::get("reservations/status/{status}", "App\Http\Controllers\api\ReservationController@getReservationByStatus");
// get reservasi by status and user id
Route::get("reservations/status/{status}/user/{id}", "App\Http\Controllers\api\ReservationController@getReservationByStatusAndUserId");
// get reservasi by status and table id
Route::get("reservations/status/{status}/table/{id}", "App\Http\Controllers\api\ReservationController@getReservationByStatusAndTableId");
// get reservasi is available this day
Route::get("reservations/available", "App\Http\Controllers\api\ReservationController@getReservationIsAvailable");
// get reservasi by search
Route::get("reservations/search/{keyword}", "App\Http\Controllers\api\ReservationController@searchReservation");
// get reservasi by search and user id get
Route::get("reservations/search/{keyword}/user/{id}", "App\Http\Controllers\api\ReservationController@searchReservationByUserId");
// get reservasi by search and user id post
Route::post("reservations/search/byUserId}", "App\Http\Controllers\api\ReservationController@searchReservationByUserIdPost");
// get available table by reservation
Route::get("reservations/available/table", "App\Http\Controllers\api\ReservationController@getAvailableTablesByReservation");
// get not available table by reservation
Route::get("reservations/not-available/table", "App\Http\Controllers\api\ReservationController@getNotAvailableTablesByReservation");

// Menu api
// get all menu
Route::get("menus", "App\Http\Controllers\api\MenuController@getMenus");
// get menu by id
Route::get("menus/{id}", "App\Http\Controllers\api\MenuController@getMenuById");
// search menu using nicolaslopezj/searchable
Route::get("menus/search/{keyword}", "App\Http\Controllers\api\MenuController@searchMenu");
// get menu available stock
Route::get("menus/available", "App\Http\Controllers\api\MenuController@getMenuAvailableStock");
// get menu not available stock
Route::get("menus/not-available", "App\Http\Controllers\api\MenuController@getMenuNotAvailableStock");
// get menu by price >=
Route::get("menus/price/{price}", "App\Http\Controllers\api\MenuController@getMenuByPrice");
// get menu by price <=
Route::get("menus/price/less-than/{price}", "App\Http\Controllers\api\MenuController@getMenuByPriceLessThan");
// get menu by price >= and price <=
Route::get("menus/price/{price1}/{price2}", "App\Http\Controllers\api\MenuController@getMenuByPriceBetween");
});









