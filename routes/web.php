<?php

use Illuminate\Support\Facades\Route;

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

Route::get('test/json', 'TestController@getListAsJson');
Route::resource('test', 'TestController');


Route::get('event', function () {

    event(new \App\Events\UserCEvent(\App\User::query()->first()));

    $user = new \App\User();
    $user->email = "asdasd@asdasd.aa" . time();
    $user->name = "asdasd@asdasd.aa";
    $user->password = "asdasd@asdasd.aa";
    $user->save();

});