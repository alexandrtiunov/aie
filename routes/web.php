<?php

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

Route::get('/', 'IndexController@index');
Route::post('/', 'IndexController@store');

Route::get('/createWallet', 'WalletController@createWallet');
Route::post('/createWallet', 'WalletController@addWallet');

Route::get('/moneyincome', 'WalletController@createIncome');
Route::post('/moneyincome', 'WalletController@addIncome');

Route::resource('operations', 'Operations\OperationController')->middleware('auth');

Route::get('/addnewproduct', 'Operations\ProductController@index');
Route::post('/addnewproduct', 'Operations\ProductController@store');

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
