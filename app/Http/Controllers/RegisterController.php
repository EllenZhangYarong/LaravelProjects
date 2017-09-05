<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    //Register page
    public function index(){
        return view('register.index');

    }
    //Register Logic
    public function register(){

        //Validate
        $this->validate(\request(),[
            'name'     => 'required|min:3|unique:users,name',
            'email'    => 'required|unique:users,email|email',
            'password' => 'required|min:5|max:10|confirmed',
        ]);

        //Logic
        $name = \request('name');
        $email = \request('email');
        $password=bcrypt(\request('password'));
        $user = User::create(compact('name','email','password'));

        //Render page
        return redirect('/login');
    }
}
