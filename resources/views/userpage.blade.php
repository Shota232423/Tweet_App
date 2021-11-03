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

            {{-- 編集 --}}
            @if ($user_info->name == $now_login_user)
            <div class="mt-3">
                <a class="btn btn-primary" href="{{route('userpage_edit',[$now_login_user,$tweet->id])}}"
                    role="button">編集</a>
                <a class="btn btn-danger" role="button" href="{{route('userpage_del',[$now_login_user,$tweet->id])}}"
                    onclick="return confirm('本当に削除しますか？')">削除</a>
            </div>
            @endif
        </div>
        @endforeach
    </div>
</div>
@endsection
