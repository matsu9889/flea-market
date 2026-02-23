@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="item_container">
        @foreach ($items as $item)
        <div class="item">
            <a class="item__link" href="/item/{{ $item->id }}">
                <div class="item__img-area">
                    <img class="item__img" src="{{ asset('storage/' . $item->img_url) }}" alt="商品画像">
                </div>
                <p class="item__name">{{ $item->item_name }}</p>
            </a>
        </div>
        @endforeach
    </div>
    @endsection