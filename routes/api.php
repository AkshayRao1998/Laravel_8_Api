<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DummyPI;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("login",[UserController::class,'index']);


Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's
Route::get('list/{id?}',[DeviceController::class, 'list']);
Route::post('send',[DeviceController::class, 'PostData']);
Route::put('update',[DeviceController::class, 'UpdateData']);
Route::get('search/{name}',[DeviceController::class, 'Search']);
Route::delete('delete/{id}',[DeviceController::class, 'Delete']);

});




Route::post('validate',[DeviceController::class, 'Save']);








