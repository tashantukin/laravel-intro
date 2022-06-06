<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;


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


// Route::post('/post',[PostController::class,'create']);
// Route::get('/post',[PostController::class,'index']);
// Route::put('/post/{post}',[PostController::class,'update']);
// Route::get('/post/{post}',[PostController::class,'show']);
// Route::delete('/post/{post}',[PostController::class,'destroy']);

Route::apiResource('/post', PostController::class)->middleware('auth:sanctum');
Route::apiResource('/users', UsersController::class);
Route::post('/tokens/create/{user}', [UsersController::class, 'createToken']);
Route::post('/login', [UsersController::class, 'login']);
Route::post('/logout', [UsersController::class, 'logout'])->middleware('auth:sanctum');
