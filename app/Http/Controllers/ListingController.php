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
            filter(request(['tag', 'search']))->paginate(6)
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

        return back()->with('message', 'Updated Successfully!');
    }

    //delete job listing
    public function destroy(JobListings $listing){
        $listing->delete();
        return redirect ('/')->with('message', 'Deleted Successfully!');
    }


}
