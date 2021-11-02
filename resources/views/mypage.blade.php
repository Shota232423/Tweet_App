@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mt-3">
        @foreach ($tweets as $tweet)
        <div class="tweet_content col-10 mx-auto border bg-white p-2">
            <p>{{$tweet->user->name}}　{{$tweet->updated_at}}</p>
            {{-- {!! !!}を使ってエスケープ無効化にする --}}
            {{-- でもmakelink側でヘルパ関数のeを使って対策済み --}}
            <p>{!! nl2br($tweet->makelink()) !!}</p>
            <a class="btn btn-primary" href="{{route('mypage_edit',$tweet->id)}}" role="button">編集</a>
            <a class="btn btn-danger" role="button" href="{{route('mypage_del',$tweet->id)}}"
                onclick="return confirm('本当に削除しますか？')">削除</a>
        </div>
        @endforeach
    </div>
</div>
@endsection
