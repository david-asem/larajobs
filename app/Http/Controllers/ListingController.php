<?php

namespace App\Http\Controllers;

use App\Models\JobListings;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


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

    //show create new job listing
    public function create(){
        return view('listings.create');
    }

    //store new job listing
    public function store(Request $request){
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'company_name' => 'required',
            'location' => 'required',
            'tags' => 'required',
            'email' => ['required', 'email'],
            'website' => 'required',
            'job_id'=> 'required',
            'name_of_team' => 'required',

        ]);

        JobListings::create($validatedData);

        return redirect('/')->with('message', 'Job Listed Successfully!');
    }
}
