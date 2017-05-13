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

Route::get('/accountingsystem', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/invoice', function () {
    return view('invoice');
});

Route::get('/expenditure', function () {
    return view('expenditure');
});

Route::post('/invoices', 'InvoiceController@store');
Route::post('/expenditures', 'ExpendituresController@store');

Route::get('/report',function(){
    return view('report');
});

