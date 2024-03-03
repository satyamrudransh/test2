<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Test\Calculator\UserController;
// use HelloWorld\Hello;


Route::get('cal',function(){

    echo "hello";
});


Route::get('/test', [UserController::class, 'index']);
// Route::get('/test', 'UserController@index');
