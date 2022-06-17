<?php

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
Route::get('/', function () {
    return view('jobListings', [
        'heading' => 'Latest Jobs',
        'listings'=> JobListings::all(),



    ]);
});

//get Single JobListings

Route::get('/listings/{id}', function ($id){
    return view('singleListing', [
        'listing'=>JobListings::find($id)
    ]);
});


