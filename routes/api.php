<?php

use App\Http\Controllers\RecipeController;
use App\Http\Controllers\AuthController;
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
// Route::resource('/recipe', RecipeController::class);


//public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/recipe', [RecipeController::class, 'index']);
Route::get('/recipe/{id}', [RecipeController::class, 'show']);
Route::get('/recipe/search/{name}', [RecipeController::class, 'search']);


//protected routes 
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/recipe', [RecipeController::class, 'store']);
    Route::put('/recipe/{id}', [RecipeController::class, 'update']);
    Route::delete('/recipe/{id}', [RecipeController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);


});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
    
});
