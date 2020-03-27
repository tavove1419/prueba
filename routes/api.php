<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    
], function () {


//Customer
Route::post('/customer/create', 'Customer\CustomerController@insert');
Route::post('/customer/actualizar', 'Customer\CustomerController@actualizar');
Route::post('/customer/delete', 'Customer\CustomerController@eliminar');
Route::get('/customer/list', 'Customer\CustomerController@getList');

//Agent
Route::get('agent/listAgent', 'Customer\CustomerController@agentList');
Route::post('agent/createAgent', 'Customer\CustomerController@createAgent');


});