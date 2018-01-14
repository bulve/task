<?php

use Illuminate\Http\Request;

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



Route::get('clients', 'ClientController@index' );

Route::get('client/{client_id}', 'ClientController@show');

Route::post('client', 'ClientController@store');

Route::get('account/{client_id}/client', 'AccountController@showClientAccount');

Route::get('account/{account_id}/dietails', 'AccountController@showAccountDietails');

Route::get('accounts', 'AccountController@index' );

Route::get('account/{account_id}', 'AccountController@show');

Route::post('account', 'AccountController@store');

Route::get('transactions', 'TransactionController@index' );

Route::get('transaction/{transaction_id}', 'TransactionController@show');

Route::get('transaction/{account_id}/account', 'TransactionController@showAccountTransactions');

Route::post('transaction', 'TransactionController@store',  ['middleware' => 'cors']);


 
Route::get('products/{product}', function ($productId) {
    return response(Product::find($productId), 200);
});
  
 
Route::post('products', function(Request $request) {
   $resp = Product::create($request->all());
    return $resp;
 
});
 
Route::put('products/{product}', function(Request $request, $productId) {
    $product = Product::findOrFail($productId);
    $product->update($request->all());
    return $product;
});
 
Route::delete('products/{product}',function($productId) {
    Product::find($productId)->delete();
 
    return 204;
 
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
