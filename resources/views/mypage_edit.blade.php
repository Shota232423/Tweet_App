@extends('layouts.app')
@section('content')
<div class="row">
    <form class="col-10 mx-auto" action="/mypage/edit" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$tweet->id}}">
        <div>
            <textarea class="form-control" rows="4" name="tweet">{{$tweet->tweet_content}}</textarea>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary mt-2">編集</button>
        </div>
    </form>
</div>

@endsection
