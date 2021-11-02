<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TweetRequest;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //tweetを全部取得する(update最新順)
        $tweets = Tweet::orderBy('updated_at','desc')->paginate(10);
        //dd($tweets);
        return view('home',['tweets'=>$tweets]);
    }

    public function tweet(TweetRequest $request)
    {
        $tweet = new Tweet();
        //tweetしたユーザーのid
        $tweet->user_id = Auth::id();
        //tweetの内容
        $tweet->tweet_content = $request->tweet;
        //tweetのimg
        $img_content = $request->file('img_file');
        if (!empty($img_content)) {
            $img_path = $img_content->storeAs('img', $img_content->getClientOriginalName(), 'public');
            $tweet->img = $img_path;
        }
        $tweet->save();
        //リダイレクト処理
        return redirect()->route('home');
    }
}