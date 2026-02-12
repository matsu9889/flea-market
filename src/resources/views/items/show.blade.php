@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
<link rel="stylesheet" href="{{ asset('css/item_show.css') }}">
@endsection

@section('content')
<div class="container">
    <!-- <form action="/item/" method="GET"> -->
    <div class="item_container">
        <div class="item">
            <div class="item-img">
                <img src="{{ asset('storage/' . $item->img_url) }}" alt="商品画像">
            </div>

            <div class="item-detail">
                <!-- 商品名 -->
                <p>{{ $item->item_name }}</p>
                <!-- ブランド名 -->
                <p></p>
                <!-- 金額 -->
                <p></p>
                <!-- いいねボタン、コメントボタン -->
                <button>購入手続きへ</button>
                <h2>商品説明</h2>
                <p>{{ $item->description }}</p>
                <h2>商品の情報</h2>
                <h3>カテゴリー</h3>
                <h3>商品の状態</h3>
                <p>{{ $item->condition }}</p>
                <h2>コメント</h2>
                <h2>商品へのコメント</h2>
                <button>コメントを送信する</button>
            </div>

        </div>
    </div>
    <!-- </form> -->
</div>
@endsection