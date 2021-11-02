@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form class="col-10 mx-auto" action="/home" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <textarea class="form-control" rows="4" name="tweet"></textarea>
            </div>
            {{-- <div class="mt-3">
                <input type="file">
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary mt-2">ツイート</button>
            </div> --}}
            <div class="d-flex justify-content-between align-items-center mt-3">
                <input type="file" name="img_file">
                <button type="submit" class="btn btn-primary">ツイート</button>
            </div>
        </form>
    </div>
    {{-- 全ツイート表示 --}}
    <div class="row mt-5">
        @foreach ($tweets as $tweet)
        <div class="tweet_content col-10 mx-auto border bg-white p-2">
            <p><a href="{{$tweet->user->name}}">{{$tweet->user->name}}</a>　{{$tweet->updated_at}}</p>
            {{-- {!! !!}を使ってエスケープ無効化にする --}}
            {{-- でもmakelink側でヘルパ関数のeを使って対策済み --}}
            <p>{!! nl2br($tweet->makelink()) !!}</p>
            @if (!empty($tweet->img))
            <img src="{{asset('storage/'.$tweet->img)}}" alt="" style="width:100%">
            @endif
        </div>
        @endforeach

    </div>
    <div class="row mt-3">
        <div class="mx-auto">
            {{ $tweets->links() }}
        </div>
    </div>
</div>
@endsection
