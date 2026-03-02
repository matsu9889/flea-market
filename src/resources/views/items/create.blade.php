@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
<link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('content')
<form action="/sell" method="post">
    @csrf
    <div class="sell__container">
        <h1 class='sell__title'>商品の出品</h1>

        <div class="sell__field">
            <label class="sell__label">商品画像</label>
            <input class="sell__file" type="file" name="image">
                画像を選択する
        </div>

        <section class="sell__section">
            <h2 class="sell__section-title">商品の詳細</h2>
            <div class="sell__field">
                <label class="sell__label">カテゴリー</label>
                <div class="sell__tags">
                    <label class="sell__tag">
                        <input type="checkbox" name="categories[]" value="1">
                        <span>ファッション</span>
                    </label>
                    <label class="sell__tag">
                        <input type="checkbox" name="categories[]" value="2">
                        <span>家電</span>
                    </label>
                    <label class="sell__tag">
                        <input type="checkbox" name="categories[]" value="3">
                        <span>インテリア</span>
                    </label>
                    <label class="sell__tag">
                        <input type="checkbox" name="categories[]" value="4">
                        <span>レディース</span>
                    </label>
                    <label class="sell__tag">
                        <input type="checkbox" name="categories[]" value="5">
                        <span>メンズ</span>
                    </label>
                    <label class="sell__tag">
                        <input type="checkbox" name="categories[]" value="6">
                        <span>コスメ</span>
                    </label>
                    <label class="sell__tag">
                        <input type="checkbox" name="categories[]" value="7">
                        <span>本</span>
                    </label>
                    <label class="sell__tag">
                        <input type="checkbox" name="categories[]" value="8">
                        <span>ゲーム</span>
                    </label>
                    <label class="sell__tag">
                        <input type="checkbox" name="categories[]" value="9">
                        <span>スポーツ</span>
                    </label>
                    <label class="sell__tag">
                        <input type="checkbox" name="categories[]" value="10">
                        <span>キッチン</span>
                    </label>
                    <label class="sell__tag">
                        <input type="checkbox" name="categories[]" value="11">
                        <span>ハンドメイド</span>
                    </label>
                    <label class="sell__tag">
                        <input type="checkbox" name="categories[]" value="12">
                        <span>アクセサリー</span>
                    </label>
                    <label class="sell__tag">
                        <input type="checkbox" name="categories[]" value="13">
                        <span>おもちゃ</span>
                    </label>
                    <label class="sell__tag">
                        <input type="checkbox" name="categories[]" value="14">
                        <span>ベビー・キッズ</span>
                    </label>
                </div>
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
            </div>
        </section>

        <section class="sell__section">
            <h2 class="sell__section-title">商品名と説明</h2>
            <div class="sell__field">
                <label for="name" class="sell__label">商品名</label>
                <input class="sell__input" type="text" name="name" id="name">
            </div>
            <div class="sell__field">
                <label for="brand" class="sell__label">ブランド名</label>
                <input class="sell__input" type="text" id="brand" name="brand">
            </div>
            <div class="sell__field">
                <label for="description" class="sell__label">商品の説明</label>
                <textarea class="sell__textarea" id="description" name="description"></textarea>
            </div>
            <div class="sell__field">
                <label for="price" class="sell__label">販売価格</label>
                <span>&yen;</span>
                <input class="sell__input" type="number" id="price" name="price">
            </div>
        </section>

        <div>
            <button class="sell__submit">出品する</button>
        </div>
    </div>
</form>
@endsection