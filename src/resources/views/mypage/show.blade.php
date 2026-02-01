@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('content')
<form action="/show" method="GET">
    <div class="profile">
        <div class="profile__image">
            <img src="" alt="プロフィール画像">
        </div>
        <div class="profile__user-name">
            <h2>ユーザー名</h2>
        </div>
        <div class="profile__link">
            <a class="profile__link-edit" href="/mypage/profile">プロフィールを編集</a>
        </div>
    </div>


    <div class="buttons">
        <button class="listing-button">出品した商品</button>
        <button class="purchase-button">購入した商品</button>
    </div>
    <div class="screen">
        <!-- 出品画面 -->
        <div class="listing-container">
            <div class="listing-item">
                <div class="listing-item-img">
                    <img src="" alt="商品画像">
                </div>
                <p>商品名</p>
            </div>
            <div class="listing-item">
                <div class="listing-item-img">
                    <img src="" alt="商品画像">
                </div>
                <p>商品名</p>
            </div>
            <div class="listing-item">
                <div class="listing-item-img">
                    <img src="" alt="商品画像">
                </div>
                <p>商品名</p>
            </div>
            <div class="listing-item">
                <div class="listing-item-img">
                    <img src="" alt="商品画像">
                </div>
                <p>商品名</p>
            </div>
            <div class="listing-item">
                <div class="listing-item-img">
                    <img src="" alt="商品画像">
                </div>
                <p>商品名</p>
            </div>
        </div>
        <!-- 購入画面 -->
        <div>
            <img src="purchase" alt="">
            <p>商品名</p>
        </div>
    </div>

</form>


@endsection