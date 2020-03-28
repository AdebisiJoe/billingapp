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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/example/job', function () {
    $users = \App\User::all();
    \App\Jobs\BillUsers::dispatch($users);
});

Route::get('processbilling', 'BillingController@processQueue');