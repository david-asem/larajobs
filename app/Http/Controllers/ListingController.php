<?php

namespace App\Http\Controllers;

use App\Models\JobListings;
use Illuminate\Http\Request;


class ListingController extends Controller
{

    //retrieve all job listings from db
    public function index(){
        $listings = JobListings::all();
        return view('listings.index', [
            'listings'=> $listings
        ]);
    }

    //get Single JobListing from db
    public function show(JobListings $listing){
        return view('listings.show', [
            'listing'=>$listing
        ]);
    }
}
