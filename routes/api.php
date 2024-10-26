<?php

use App\Http\Controllers\Api\photoContoller;
use App\Http\Controllers\Api\productController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::controller(productController::class)->prefix('products')->group(function () {
    Route::get('showDeleted', 'showDel');
    Route::post('restore', 'restore');
});

Route::apiResources([
    'products'=> productController::class
]);



Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('password/requestResetPassword', [AuthController::class, 'requestResetPassword']);
Route::post('password/reset', [AuthController::class, 'resetWithCode']);

Route::get('indexPhotoByColor/{product_id}/{color}'
    ,[photoContoller::class,'indexPhotoByColor']);
