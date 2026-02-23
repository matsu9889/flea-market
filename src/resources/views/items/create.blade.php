@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<form action="/sell" method="post">
    <div class="container">
        <h1>商品の出品</h1>
        <h2>商品画像</h2>
        <div>画像を選択する</div>
        <h2>商品の詳細</h2>
        <h3>カテゴリー</h3>
        <h3>商品の状態</h3>
        <h2>商品名と説明</h2>
        <h3>商品名</h3>
        <h3>ブランド名</h3>
        <h3>商品の説明</h3>
        <h3>販売価格</h3>
    </div>
</form>
@endsection