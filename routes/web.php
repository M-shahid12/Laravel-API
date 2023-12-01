<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\dummyApi;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EntityController;

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

// entity
// routes/web.php



Route::get('/users', [UserController::class, 'index']);


Route::get('/', function () {
    return view('welcome');
});
Route::post('user', [DeviceController::class, 'userlogin']);
Route::view("login", 'login');
Route::view("profile", 'profile');
Route::get('data', ['dummyApi'::class, 'getdata']);


Route::post('/create-entity', [EntityController::class, 'createEntity']);
