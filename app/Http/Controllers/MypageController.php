<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    //自分のtweet表示
    public function index(Request $request)
    {
        $tweets = Tweet::where('user_id',Auth::id())->orderBy('updated_at', 'desc')->get();
        return view('mypage',['tweets'=>$tweets]);
    }
    //削除
    public function del(Request $request)
    {
        Tweet::find($request->id)->delete();
        return redirect()->route('mypage');
    }
    //編集画面を表示
    public function edit(Request $request)
    {
        return view('mypage_edit',['tweet'=>Tweet::find($request->id)]);
    }
    //編集処理
    public function update(Request $request)
    {
        $tweet = Tweet::find($request->id);
        $tweet->tweet_content = $request->tweet;
        $tweet->save();
        return redirect()->route('mypage');
    }
}