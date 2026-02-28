@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
<link rel="stylesheet" href="{{ asset('css/item_show.css') }}">
@endsection

@section('content')
<div class="item">
    <div class="item__img-area">
        <img class="item__img" src="{{ asset('storage/' . $item->img_url) }}" alt="商品画像">
    </div>

    <div class="item-detail">
        <!-- 商品名 -->
        <p class="item__name">{{ $item->item_name }}</p>
        <!-- ブランド名 -->
        <p class="item__brand">{{ $item->brand_name }}</p>
        <!-- 金額 -->
        <p class="item__price--yen">&yen;<span class="item__price">{{ $item->price }}</span>(税込)</p>
        <!-- いいねボタン、コメントボタン -->
        <div class="item__icon">
            <form action="/item/{{ $item->id }}/favorite" method="POST">
                @csrf
                @if($item->is_liked_by_auth_user())
                <input class="item__icon-heart--action" type="image" src="{{ asset('images/ハートロゴ_ピンク.png') }}" alt="ハートピンク">
                @else
                <input class="item__icon-heart" type="image" src="{{ asset('images/ハートロゴ_デフォルト.png') }}" alt="ハート">
                @endif
            </form>
            <input class="item__icon-speech" type="image" src="{{ asset('images/ふきだしロゴ.png') }}" alt="ふきだし">
            <div>{{ $item->favorites_count }}</div>
            <div></div>
        </div>
        <div class="item__link">
            <a class="item__link--purchase" href="/purchase/{{ $item->id }}">購入手続きへ</a>
        </div>

        <div class="item__section">
            <h2 class="item__section-title">商品説明</h2>
            <p class="item__description">{{ $item->description }}</p>
        </div>
        <div class="item__section">
            <h2 class="item__section-title">商品の情報</h2>
            <h3 class="item__section-sub-title">カテゴリー</h3>
            <h3 class="item__section-sub-title">商品の状態</h3>
            <p class="item__section-condition">{{ $item->condition }}</p>
        </div>
        <div class="item__section">
            <h2 class="item__section-comment">コメント</h2>
            <div class="item__section-comment__list">
                <!-- コメント一覧ここに入る -->
            </div>
        </div>
        <div class="item__section">
            <form action="/item/" method="POST">
                <h2 class="item__section-comment__title">商品へのコメント</h2>
                <textarea class="item__section-comment__textarea"></textarea>
                <button class="item__button">コメントを送信する</button>
            </form>
        </div>
    </div>
</div>
@endsection