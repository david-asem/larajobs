<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //show register create form
    public function create(){
        return view('users.register');
    }

    //store new user
    public function store(Request $request){
        $validatedUser = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
        ]);

        $validatedUser['password'] = bcrypt($validatedUser['password']);


        //create new user
        $user=User::create($validatedUser);

        //login new user
        auth()->login($user);

        return redirect('/')->with('message', 'You have registered and logged in successfully!');
    }



    //show login form
    public function login(){
        return view('users.login');
    }





    //authenticate registered user
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => 'required|confirmed|min:6',
        ]);
        if(auth()->attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You have logged in successfully!');
        }

        else{
            return back()->withErrors(['email'=>'Invalid Credentials!'])->onlyInput('email');
        }


    }





    //logout user
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'You have logged out successfully!');
    }
}
