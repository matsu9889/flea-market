@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
<div class="form-container">
    <h2 class="title">プロフィール設定</h2>
    <form action="/mypage/profile" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="image-group">
            <div class="image">
                <img src="" alt="プロフィール画像">
            </div>
            <div>
                <label class="image-button" for="image">画像を選択する</label>
                <input class="image-input" type="file" name="image" id="image">
            </div>
        </div>
        <div class="form-inner">
            <div class="form-group">
                <label class="form-group_label" for="user_name">ユーザー名</label>
                <input class="form-group_input" type="text" name="user_name" id="user_name" value="{{ old('user_name', $user->user_name) }}">
                <div class="error">
                    @error('user_name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="form-group_label" for="post_code">郵便番号</label>
                <input class="form-group_input" type="number" name="post_code" id="post_code" value="{{ old('post_code') }}">
                <div class="error">
                    @error('post_code')
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
                <input class="form-group_input" type="building" name="building" id="building" value="{{ old('building') }}">
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