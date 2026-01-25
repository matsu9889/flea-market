@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="form-container">
    <h2 class="title">会員登録</h2>
    <form action="/register" method="post">
        @csrf
        <div class="form-inner">
            <div class="form-group">
                <label class="form-group_label" for="name">ユーザー名</label>
                <input class="form-group_input" type="text" name="name" id="name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label class="form-group_label" for="email">メールアドレス</label>
                <input class="form-group_input" type="email" name="email" id="email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label class="form-group_label" for="password">パスワード</label>
                <input class="form-group_input" type="password" name="password" id="password">
            </div>
            <div class="form-group">
                <label class="form-group_label" for="password_confirmation">確認用パスワード</label>
                <input class="form-group_input" type="password" name="password_confirmation" id="password_confirmation">
            </div>
        </div>
        <button type="submit" class="button">登録する</button>
    </form>
    <div class="link">
        <a class="link__inner" href="/login">ログインはこちら</a>
    </div>
</div>
@endsection