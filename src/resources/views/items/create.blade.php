@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
<link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('content')
<form action="/sell" method="post" enctype="multipart/form-data">
    @csrf
    <div class="sell__container">
        <h1 class='sell__title'>商品の出品</h1>

        <div class="sell__field">
            <label class="sell__label">商品画像</label>
            <div class="sell__input-area">
                <label class="sell__image-button" for="image">
                    画像を選択する
                </label>
                <input class="sell__file" type="file" name="img_url" id="image">
            </div>
            @error('img_url')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <section class="sell__section">
            <h2 class="sell__section-title">商品の詳細</h2>
            <div class="sell__field">
                <label class="sell__label">カテゴリー</label>
                <div class="sell__tags">
                    @foreach($categories as $category)
                    <label class="sell__tag">
                        <input
                            class="sell__tag-checkbox"
                            type="checkbox"
                            name="categories[]"
                            value="{{ $category->id }}">
                        <span class="sell__tag-title">
                            {{ $category->name }}
                        </span>
                    </label>
                    @endforeach
                </div>
                @error('categories')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="sell__field">
                <label class="sell__label">商品の状態</label>
                <select class="sell__select" name="condition" id="condition">
                    <option value="">選択してください</option>
                    <option value="1">良好</option>
                    <option value="2">目立った傷や汚れなし</option>
                    <option value="3">やや傷や汚れあり</option>
                    <option value="4">状態が悪い</option>
                </select>
                @error('condition')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>
        </section>

        <section class="sell__section">
            <h2 class="sell__section-title">商品名と説明</h2>
            <div class="sell__field">
                <label for="item_name" class="sell__label">商品名</label>
                <input class="sell__input" type="text" name="item_name" id="item_name">
                @error('item_name')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="sell__field">
                <label for="brand_name" class="sell__label">ブランド名</label>
                <input class="sell__input" type="text" id="brand_name" name="brand_name">
            </div>
            <div class="sell__field">
                <label for="description" class="sell__label">商品の説明</label>
                <textarea class="sell__textarea" id="description" name="description"></textarea>
                @error('description')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="sell__field">
                <label for="price" class="sell__label">販売価格</label>
                <div class="sell__price-input">
                    <span class="sell__yen">&yen;</span>
                    <input class="sell__input sell__input--price" type="number" id="price" name="price">
                </div>
                @error('price')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>
        </section>

        <div class="sell__actions">
            <button class="sell__submit">出品する</button>
        </div>
    </div>
</form>
@endsection