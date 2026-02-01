@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
<div class="form-container">
    <h2 class="title">プロフィール設定</h2>
    <form action="/mypage/profile" method="POST">
        @csrf
        <div class="image-group">
            <div class="image">
                <img src="" alt="プロフィール画像">
            </div>
            <div>
                <button class="select-button">画像を選択する</button>
            </div>
        </div>
        <div class="form-inner">
            <div class="form-group">
                <label class="form-group_label" for="user">ユーザー名</label>
                <input class="form-group_input" type="text" name="user" id="user" value="{{ old('user') }}">
                <div class="user">
                    @error('user')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="form-group_label" for="post">郵便番号</label>
                <input class="form-group_input" type="number" name="post" id="post" value="{{ old('post') }}">
                <div class="error">
                    @error('post')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="form-group_label" for="address">住所</label>
                <input class="form-group_input" type="address" name="address" id="address" value="{{ old('address') }}">
                <div class="error">
                    @error('address')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="form-group_label" for="building">建物名</label>
                <input class="form-group_input" type="building" name="building" id="building">
                <div class="error">
                    @error('building')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="button">更新する</button>
    </form>
</div>
@endsection