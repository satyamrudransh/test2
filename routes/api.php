<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use HelloWorld\Hello;
use Illuminate\Support\Facades\Http;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware(['service-auth'])->group(function () {

    Route::get('hello/{title}',function($title){
        $post = new PostList($title);
        dd($post);
    });
    


// this is for users

Route::get('/gamification-user', 'API\User\UserController@index');
Route::get('/gamification-user/{id}', 'API\User\UserController@show');
Route::post('/gamification-user', 'API\User\UserController@store');
Route::put('/gamification-user/{id}', 'API\User\UserController@update');
Route::delete('/gamification-user/{id}', 'API\User\UserController@delete');


Route::get('/test', [Hello::class, 'index']);

// });