<?php

use App\Http\Controllers\ListingController;
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
Route::get('/listings/create', [ListingController::class, 'create'] );


//store new job listing
Route::post('/listings', [ListingController::class, 'store'] );

//show edit job listing
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'] );

//update job listing
Route::put('/listings/{listing}', [ListingController::class, 'update'] );

//delete job listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'] );



//get Single JobListing

Route::get('/listings/{listing}', [ListingController::class, 'show'] );



