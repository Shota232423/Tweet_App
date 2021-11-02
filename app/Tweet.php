<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    //Modelのリレーション
    //TweetにUser情報を紐付ける
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function makelink()
    {
        //ヘルパ関数のeを使いhtmlspecialchars、タグが効果を発揮できないようにエスケープする
        //url部分をaタグに置換する
        return mb_ereg_replace("(https?)(://[[:alnum:]\+\$\;\?\.%,!#~*/:@&=_-]+)" ,
         '<a href="\1\2">\1\2</a>' , e($this->tweet_content));
    }
}