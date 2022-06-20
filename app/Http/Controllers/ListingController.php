<?php

namespace App\Http\Controllers;

use App\Models\JobListings;
use Illuminate\Http\Request;


class ListingController extends Controller
{

    //retrieve all job listings from db
    public function index(){

        return view('listings.index', [
            'listings'=> JobListings::latest()->
            filter(request(['tag', 'search']))->get()
        ]);
    }

    //get Single JobListing from db
    public function show(JobListings $listing){
        return view('listings.show', [
            'listing'=>$listing
        ]);
    }
}
