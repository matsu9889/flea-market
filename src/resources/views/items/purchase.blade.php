@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="item_container">
        <div class="item">
            <div class="item__img-area">
                <img class="item__img" src="{{ asset('storage/' . $item->img_url) }}" alt="商品画像">
            </div>
            <p class="item__name">{{ $item->item_name }}</p>
            <p>支払い方法</p>
            <select name="" id="">
                <option value=""></option>
            </select>
            <p>配送先</p>
            <div>{{ $item->item_address }}</div>
        </div>
        <div>
            <p>商品代金</p>
            <div></div>
            <p>支払い方法</p>
            <div></div>
            <button>購入する</button>
        </div>
    </div>
    @endsection