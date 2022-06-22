<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\JobListings;

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

//retrieve all job listings
Route::get('/', [ListingController::class, 'index'] );


//show create new job listing
Route::get('/listings/create', [ListingController::class, 'create'] )->middleware('auth');


//store new job listing
Route::post('/listings', [ListingController::class, 'store'] )->middleware('auth');

//show edit job listing
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'] )->middleware('auth');

//update job listing
Route::put('/listings/{listing}', [ListingController::class, 'update'] )->middleware('auth');

//delete job listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'] )->middleware('auth');


//manage job listings
Route::get('/listings/manage', [ListingController::class, 'manage'] )->middleware('auth');




//get Single JobListing

Route::get('/listings/{listing}', [ListingController::class, 'show'] );


//show register create form
Route::get('/register', [UserController::class, 'create'] )->middleware('guest');


//store new user
Route::post('/users', [UserController::class, 'store'] );


//show login form
Route::get('/login', [UserController::class, 'login'] )->name('login')->middleware('guest');

//login registered user
Route::post('/users/authenticate', [UserController::class, 'authenticate'] );



//logout user
Route::post('/logout', [UserController::class, 'logout'] )->middleware('auth');



