<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redis;

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

// Route::get('/', function () {
//     // try{
//     //     $redis=Redis::connect('127.0.0.1',3306);
//     //     return response('redis working');
//     // }catch(\Predis\Connection\ConnectionException $e){
//     //     return response('error connection redis');
//     // }
//     return view('welcome');
// });

Route::get('/', 'App\Http\Controllers\AppController@index')->name('index');
Route::get('/store', 'App\Http\Controllers\AppController@store')->name('store');
Route::get('/set', 'App\Http\Controllers\AppController@set')->name('set');
Route::get('/lpop', 'App\Http\Controllers\AppController@lpop')->name('lpop');
Route::get('/rpop', 'App\Http\Controllers\AppController@rpop')->name('rpop');
Route::get('/delete', 'App\Http\Controllers\AppController@delete')->name('delete');