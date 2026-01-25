@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="form-container">
    <h2 class="title">ログイン</h2>
    <form action="/login" method="post">
        @csrf
        <div class="form-inner">
            <div class="form-group">
                <label class="form-group_label" for="email">メールアドレス</label>
                <input class="form-group_input" type="email" name="email" id="email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label class="form-group_label" for="password">パスワード</label>
                <input class="form-group_input" type="password" name="password" id="password">
            </div>
        </div>
        <button type="submit" class="button">ログインする</button>
    </form>
    <div class="link">
        <a class="link__inner" href="/register">会員登録はこちら</a>
    </div>
</div>
@endsection