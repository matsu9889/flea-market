@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('content')
<form action="/purchase/{{ $item->id }}" method="post">
    @csrf
    <div class="container">
        <div class="item">
            <div class="item__img-area">
                <img class="item__img" src="{{ asset('storage/' . $item->img_url) }}" alt="商品画像">
            </div>
            <div>
                <h1 class="item__name">{{ $item->item_name }}</h1>
                <h1 class="item__price">&yen;{{ $item->price }}</h1>
            </div>
        </div>
        <div class="payment">
            <h2>支払い方法</h2>
            <select class="payment__select" name="payment" id="">
                <option value="">選択してください</option>
                <option value="1">コンビニ支払い</option>
                <option value="2">カード支払い</option>
            </select>
        </div>
        <div class="delivery">
            <div class="delivery__title">
                <h2>配送先</h2>
                <a class="delivery__update" href="">変更する</a>
            </div>
            <div class="delivery__address">〒{{ Auth::user()->post_code }}</div>
            <div class="delivery__address">{{ Auth::user()->address }}</div>
            <div class="delivery__address">{{ Auth::user()->building }}</div>
        </div>
        <div class="confirmation">
            <div class="confirmation__content">
                <p class="confirmation__title">商品代金</p>
                <p class="confirmation__price">&yen;{{ $item->price }}</p>
            </div>
            <div class="confirmation__content">
                <p class="confirmation__title">支払い方法</p>
                <p class="confirmation__method"></p>
            </div>
        </div>
        <div class="purchase">
            <button class="purchase__button">購入する</button>
        </div>
    </div>
</form>

<script>
    const select = document.querySelector('.payment__select');
    const method = document.querySelector('.confirmation__method');

    select.addEventListener('change', function() {
        method.textContent = select.options[select.selectedIndex].text;
    });
</script>
@endsection