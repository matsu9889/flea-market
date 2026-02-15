@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="container">
    <form action="/" method="GET">
        <div class="buttons">
            <button class="recommend-button">おすすめ</button>
            <button class="mylist-button">マイリスト</button>
        </div>

        <div class="item_container">
            @foreach ($items as $item)
            <div class="item">
                <div class="item__img-area">
                    <img class="item__img" src="{{ asset('storage/' . $item->img_url) }}" alt="商品画像">
                    @if($item->purchase)
                    <div class="item__img-sold">
                        <p class="item__img-message">Sold</p>
                    </div>
                    @endif
                </div>
                <p>{{ $item->item_name }}</p>
            </div>
            @endforeach
        </div>
    </form>
</div>
@endsection