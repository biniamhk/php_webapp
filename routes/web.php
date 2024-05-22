<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\http\Controllers\ExampleController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//user related route
Route::get('/', [UserController::class,"showCorrectHomepage"]);
//Route::get('/', [ExampleController::class,"homepage"]);
Route::get('/about', [ExampleController::class,"aboutpage"]);
Route::post('/register', [UserController::class,"register"]);
Route::post('/login', [UserController::class,"login"]);
Route::post('/logout', [UserController::class,"logout"]);

//blog related route
Route::get("/create-post", [PostController::class,"showCreateForm"]);
Route::post("/create-post", [PostController::class,"storeNewPost"]);
Route::get("/post/{posted}", [PostController::class,"showSinglePost"]);

