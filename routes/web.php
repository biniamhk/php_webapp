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
Route::get('/', [UserController::class,"showCorrectHomepage"])->name("login");
//Route::get('/', [ExampleController::class,"homepage"]);
Route::get('/about', [ExampleController::class,"aboutpage"]);
Route::post('/register', [UserController::class,"register"])->middleware("guest");
Route::post('/login', [UserController::class,"login"])->middleware("guest");
Route::post('/logout', [UserController::class,"logout"])->middleware("auth");

//blog related route
Route::get("/create-post", [PostController::class,"showCreateForm"])->middleware("mustbeloggedin");
Route::post("/create-post", [PostController::class,"storeNewPost"])->middleware("mustbeloggedin");;
Route::get("/post/{posted}", [PostController::class,"showSinglePost"]);
Route::delete("/post/{post}", [PostController::class,"delete"])->middleware("can:delete,post");
Route::get("/post/{post}/edit", [PostController::class,"showEditForm"])->middleware("can:update,post");
Route::put("/post/{post}", [PostController::class,"newUpdate"])->middleware("can:update,post");

//profile related routes
Route::get("/profile/{user:username}", [UserController::class,"profile"])->middleware("auth");

