@extends('layouts.app')

@section('content')
<div class="bg-img">
    <div class="absolute-jumbotron">
        <h1 class="jumbotron-title">あなたにとっての<br>HEROは誰ですか？</h1>
        <div class="jumbotron-text">自分に影響を与えたHEROを共有しよう！</div>
    </div>
@guest
    <div class="absolute-button">
        <a href="{{ route('register') }}" class="btn-origin-register">無料ユーザー登録</a>
        <a href="{{ route('login') }}" class="btn-origin-login">ログイン</a>
    </div>
@endguest
</div>

@endsection
