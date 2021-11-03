<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tweet;
use Illuminate\Support\Facades\Auth;

class UserPageController extends Controller
{
    //
    public function index(Request $request)
    {
        $user_name =  $request->name;
        $user_info = User::where('name',$user_name)->first();
        return view('userpage',['user_info'=>$user_info,'now_login_user'=>Auth::user()->name]);
    }

    //削除
    public function del(Request $request)
    {
        Tweet::find($request->id)->delete();
        return redirect()->route('user_page',Auth::user()->name);
    }
    //編集画面を表示
    public function edit(Request $request)
    {
        return view('userpage_edit',['tweet'=>Tweet::find($request->id)]);
    }
    //編集処理
    public function update(Request $request)
    {
        $tweet = Tweet::find($request->id);
        $tweet->tweet_content = $request->tweet;
        $tweet->save();
        return redirect()->route('user_page',Auth::user()->name);
    }
}