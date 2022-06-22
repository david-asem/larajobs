<?php

namespace App\Http\Controllers;

use App\Models\JobListings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;


class ListingController extends Controller
{







    //retrieve all job listings from db
    public function index(){
        return view('listings.index', [
            'listings'=> JobListings::latest()->
            filter(request(['tag', 'search']))->paginate(10)
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

        if($request->hasFile('logo')){
            $validatedData['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $validatedData['user_id'] = auth()->id();

        JobListings::create($validatedData);

        return redirect('/')->with('message', 'Job Listed Successfully!');
    }

    //show edit job listing
    public function edit(JobListings $listing){
        return view('listings.edit', [
            'listing'=>$listing
        ]);
    }

    //update job listing
    public function update(Request $request, JobListings $listing){

        //make sure logged user is owner of job listing

        if($listing->user_id !== auth()->id()){
            abort(403, 'Unauthorized action.');
        }


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

        if($request->hasFile('logo')){
            $validatedData['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($validatedData);

        return redirect('/')->with('message', 'Job Updated Successfully!');
    }

    //delete job listing
    public function destroy(JobListings $listing){
        //make sure logged user is owner of job listing

        if($listing->user_id !== auth()->id()){
            abort(403, 'Unauthorized action.');
        }
        $listing->delete();
        return redirect ('/')->with('message', 'Deleted Successfully!');
    }


    //show all job listings by user
    public function manage(){
        return view('listings.manage', [
            'listings'=>auth()->user()->listings()->get()
        ]);
    }


}
