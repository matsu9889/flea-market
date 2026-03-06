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
        <h1 class="item__name">{{ $item->item_name }}</h1>
        <!-- ブランド名 -->
        <p class="item__brand">{{ $item->brand_name }}</p>
        <!-- 金額 -->
        <p class="item__price--yen">&yen;<span class="item__price">{{ $item->price }}</span>(税込)</p>
        <!-- いいねボタン、コメントボタン -->
        <div class="item__icon--container">
            <div class="item__icon">
                <form action="/item/{{ $item->id }}/favorite" method="POST">
                    @csrf
                    @if($item->is_liked_by_auth_user())
                    <input type="image" src="{{ asset('images/ハートロゴ_ピンク.png') }}" alt="ハートピンク">
                    @else
                    <input type="image" src="{{ asset('images/ハートロゴ_デフォルト.png') }}" alt="ハート">
                    @endif
                </form>
                <div class="item__icon--count">{{ $item->favorites_count }}</div>
            </div>
            <div class="item__icon">
                <input type="image" src="{{ asset('images/ふきだしロゴ.png') }}" alt="ふきだし">
                <div class="item__icon--count">{{ $item->comments_count }}</div>
            </div>
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
            @foreach($item->categories as $category)
            <div class="item__category">{{ $category->name }}</div>
            @endforeach
            <h3 class="item__section-sub-title">商品の状態</h3>
            <p class="item__section-condition">{{ $item->condition }}</p>
        </div>
        <div class="item__section">
            <h2 class="item__section-comment">コメント({{ $item->comments_count }})</h2>
            @foreach($item->comments as $comment)
            <div class="item__section-comment__list">
                <img class="item__comment--user-image" src="{{ asset('storage/' . $comment->user->image) }}" alt="ユーザー画像">
                <div class="item__comment--user-name">{{ $comment->user->user_name }}</div>
                <div class="item__comment--content">{{ $comment->content }}</div>
            </div>
            @endforeach
        </div>
        <div class="item__section">
            <form action="/item/{{ $item->id }}/comment" method="POST">
                @csrf
                <h2 class="item__section-comment__title">商品へのコメント</h2>
                <textarea class="item__section-comment__textarea" name="content">{{ old('content') }}</textarea>
                <button class="item__section-comment__button">コメントを送信する</button>
            </form>
        </div>
    </div>
</div>
@endsection