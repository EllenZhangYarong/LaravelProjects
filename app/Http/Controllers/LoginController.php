<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    //Login first page
    public function index(){
        return view('login.index');
    }
    //Login logic
    public function login(){
        //As long as it is a form submit action, there must be three step3 to deal with it
        //Step 1: validate
        $this -> validate(request(),[
            'email' => 'required|email',
            'password' => 'required|min:5|max:10',
            'is_remember' => 'integer',
        ]);

        //Step 2: business logic
        //Succeed in Login
        $user = request(['email','password']);
        $is_remember = boolval(request('is_remember'));
        if(\Auth::attempt($user,$is_remember)){
            return redirect('/posts');
        }

        //Failed to login
        //Step 3: render a page to users
        return \Redirect::back()->withErrors('Email and password dosn\'t match!');

    }
    //Logout page
    public function logout(){
        \Auth::logout();
        return redirect('/login');
    }
}
