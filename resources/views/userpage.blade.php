@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mt-5">
        @foreach ($user_info->tweets as $tweet)
        <div class="tweet_content col-10 mx-auto border bg-white p-2">
            <p><a href="{{$user_info->name}}">{{$tweet->user->name}}</a>　{{$tweet->updated_at}}</p>
            {{-- {!! !!}を使ってエスケープ無効化にする --}}
            {{-- でもmakelink側でヘルパ関数のeを使って対策済み --}}
            <p>{!! nl2br($tweet->makelink()) !!}</p>
            @if (!empty($tweet->img))
            <img src="{{asset('storage/'.$tweet->img)}}" alt="" style="width:100%">
            @endif
        </div>
        @endforeach
    </div>
</div>
@endsection
