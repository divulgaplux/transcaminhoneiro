<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth/login', 'API\AuthController@login');
Route::post('/auth/register', 'API\AuthController@register');

Route::resource('/companies', 'API\CompanyController');
Route::resource('/companytrucks', 'API\CompanyTruckController');
Route::resource('/ratings', 'API\RatingController');
Route::resource('/shippings', 'API\ShippingController');
Route::resource('/trucks', 'API\TruckController');
Route::resource('/requests', 'API\RequestController');
Route::resource('/clients', 'API\ClientController');
Route::resource('/contracts', 'API\ContractController');

Route::post('/calculate-shipping-value', 'API\ShippingController@calculateShipping');





