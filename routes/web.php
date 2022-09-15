<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users','UserController');

Route::resource('transactions','TransactionController');

Route::post('verify_transaction','TransactionController@verifyTransaction');

Route::resource('card_account','CardAccountController');

Route::resource('cards','CardController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
