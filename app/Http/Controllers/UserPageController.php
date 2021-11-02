<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tweet;

class UserPageController extends Controller
{
    //
    public function index(Request $request)
    {
        $user_name =  $request->name;
        $user_info = User::where('name',$user_name)->first();
        return view('userpage',['user_info'=>$user_info]);
    }
}