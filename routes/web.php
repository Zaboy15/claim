<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'ClaimController@index')->name('index');

/**
 * BACKEND PROSES AJAX
 */

Route::post('/login', 'UsersController@LoginSubmit')->name('LoginSubmit');
Route::get("/dashboard", "DashboardController@DashboardView")->name("DashboardView");
Route::get("/dashboard/total-claim-per-product", 'GraphController@total_claim_per_product')->name('total_claim_per_product');
Route::get("/claim-request-approval", "DashboardController@ClaimRequestView")->name("ClaimRequestView");
Route::get("/claim-request-approval/data", "DashboardController@ClaimRequestData")->name("ClaimRequestData");
Route::get("/claim-delivery", "DashboardController@ClaimDeliveryView")->name("ClaimDeliveryView");
Route::get("/claim-delivery/data", "DashboardController@ClaimDeliveryData")->name("ClaimDeliveryData");
// Route::get("/dashboard/total-claim-per-product", 'GraphController@total_claim_per_product')->name('total_claim_per_product');

/**
 * END OF BACKEND PROSES AJAX
 */

Route::get('/store/getCity', 'StoreController@getCity');

Route::get('/store/getStore', 'StoreController@getStore')->name('getStore');