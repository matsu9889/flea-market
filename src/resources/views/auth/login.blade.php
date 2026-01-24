@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<h2>ログイン</h2>
<form action="/login" method="post">
    <div>
        <label for="email">メールアドレス</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}">
    </div>
    <div>
        <label for="password">パスワード</label>
        <input type="password" name="password" id="password">
    </div>
    <button>ログイン</button>
</form>
<div>
    <a href="">会員登録はこちら</a>
</div>
@endsection