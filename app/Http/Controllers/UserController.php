<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //User Personal Setting page
    public function setting(){
        return view('user.setting');
    }

    //Setting logic
    public function settingSave(){

        //TODO: settingSave
    }
}
