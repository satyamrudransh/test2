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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['service-auth'])->group(function () {




// this is for users

Route::get('/gamification-user', 'API\User\UserController@index');
Route::get('/gamification-user/{id}', 'API\User\UserController@show');
Route::post('/gamification-user', 'API\User\UserController@store');
Route::put('/gamification-user/{id}', 'API\User\UserController@update');
Route::delete('/gamification-user/{id}', 'API\User\UserController@delete');

//end of users

// this is for task

Route::get('/gamification-task', 'API\Task\TaskController@index');
Route::get('/gamification-task/{id}', 'API\Task\TaskController@show');
Route::post('/gamification-task', 'API\Task\TaskController@store');
Route::put('/gamification-task/{id}', 'API\Task\TaskController@update');
Route::delete('/gamification-task/{id}', 'API\Task\TaskController@delete');
//end of task


// this is for badge
Route::get('/gamification-badge', 'API\Badge\BadgeController@index');
Route::get('/gamification-badge/{id}', 'API\Badge\BadgeController@show');
Route::post('/gamification-badge', 'API\Badge\BadgeController@store');
Route::put('/gamification-badge/{id}', 'API\Badge\BadgeController@update');
Route::delete('/gamification-badge/{id}', 'API\Badge\BadgeController@delete');


// this is for task type
Route::get('/gamification-task-type', 'API\TaskType\TaskTypeController@index');
Route::get('/gamification-task-type/{id}', 'API\TaskType\TaskTypeController@show');
Route::post('/gamification-task-type', 'API\TaskType\TaskTypeController@store');
Route::put('/gamification-task-type/{id}', 'API\TaskType\TaskTypeController@update');
Route::delete('/gamification-task-type/{id}', 'API\TaskType\TaskTypeController@delete');

// this is for task coins
Route::get('/gamification-task-coins', 'API\TaskCoinsConfiguration\TaskCoinsConfigurationController@index');
Route::post('/gamification-task-coins', 'API\TaskCoinsConfiguration\TaskCoinsConfigurationController@store');
Route::put('/gamification-task-coins/{id}', 'API\TaskCoinsConfiguration\TaskCoinsConfigurationController@update');

Route::get('/gamification-badge-coins', 'API\BadgeCoinsConfiguration\BadgeCoinsConfigurationController@index');
Route::get('/gamification-user-coins', 'API\UserCoins\UserCoinsController@index');
Route::get('/gamification-task-badges', 'API\TaskBadge\TaskBadgeController@index');


// sync api's are here
Route::get('/sync-gamification-user', 'API\Sync\SyncUserController@syncUser');


//this url used for users joining details CRUD operations
Route::get('/gamification-users-joining-details', 'API\UsersJoiningDetails\UsersJoiningDetailsController@index');
Route::get('/gamification-users-joining-details/{id}', 'API\UsersJoiningDetails\UsersJoiningDetailsController@show');
Route::post('/gamification-users-joining-details', 'API\UsersJoiningDetails\UsersJoiningDetailsController@store');
Route::put('/gamification-users-joining-details/{id}', 'API\UsersJoiningDetails\UsersJoiningDetailsController@update');
Route::delete('/gamification-users-joining-details-softdelete', 'API\UsersJoiningDetails\UsersJoiningDetailsController@delete');
Route::delete('/gamification-users-joining-details-forcedelete', 'API\UsersJoiningDetails\UsersJoiningDetailsController@destroy');

Route::post('/check-status', 'API\Task\TaskController@checkStatus');






});