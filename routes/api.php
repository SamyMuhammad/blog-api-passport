<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('register', [PassportAuthController::class, 'registerUser']);
Route::post('login', [PassportAuthController::class, 'loginUser']);

Route::middleware('auth:api')->group(function (){
    Route::get('user', [PassportAuthController::class, 'authenticatedUserDetails']);
    Route::apiResources([
        'roles' => RoleController::class,
        'users' => UserController::class,
        'categories' => CategoryController::class,
        'tags' => TagController::class,
        'posts' => PostController::class,
    ]);
});
