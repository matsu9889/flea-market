@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="buttons">
        <button class="recommend-button">おすすめ</button>
        <button class="mylist-button">マイリスト</button>
    </div>

    <div class="screen">
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
    </div>
</div>
@endsection