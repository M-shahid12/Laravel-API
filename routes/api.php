<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;

use App\Http\Controllers\dummyApi;
use App\Models\Device;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EntitiesController;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\FieldController;

//use App\Http\Controllers\EntityController;

use App\Http\Controllers\ApplicationController;
use Spatie\FlareClient\Api;

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

Route::post("add", [DeviceController::class, 'add']);
Route::put("update", [DeviceController::class, 'update']);
Route::delete("delete/{id}", [DeviceController::class, 'delete']);
Route::get("search/{name}", [DeviceController::class, 'search']);

Route::post("validation", [DeviceController::class, 'testData']);
Route::get("data", [dummyApi::class, 'getdata']);
Route::get("list", [DeviceController::class, 'list']);
//fields
Route::post("fieldadd", [FieldController::class, 'fieldadd']);

Route::get("fieldlist", [FieldController::class, 'list']);
Route::put("fieldupdate", [FieldController::class, 'fieldupdate']);
Route::delete("fielddelete/{id}", [FieldController::class, 'fielddelete']);



// Entities




//Route::post('/entities', [EntitiesController::class, 'createEntity']);


Route::post('/entities', [EntitiesController::class, 'create']);
Route::post('/entities', [EntitiesController::class, 'create'])->middleware('auth:api');




Route::post('/edit-entities', [EntityController::class, 'createEntity']);




Route::apiResource("member", MemberController::class);

Route::post("login", [UserController::class, 'login']);
//Route::post("register", [registerController::class, 'register']);
Route::post('/registers', [DeviceController::class, 'register']);



// routes/api.php



//Route::get('/applications', [ApplicationController::class, 'index']);


// routes/api.php



Route::middleware(['auth:api', 'api.middleware'])->group(function () {
    // Define your API routes here
});




Route::post('register', [ApiController::class, 'index']);



Route::resource('apps', ApiController::class);
