@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
<div class="form-container">
    <h2 class="title">住所の変更</h2>
    <form action="/purchase/address/{{ $item->id }}" method="POST">
        @csrf
        <div class="form-inner">
            <div class="form-group">
                <label class="form-group_label" for="post_code">郵便番号</label>
                <input class="form-group_input" type="text" name="post_code" id="post_code" value="{{ old('post_code',$user->post_code) }}">
                <div class="error">
                    @error('post_code')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="form-group_label" for="address">住所</label>
                <input class="form-group_input" type="address" name="address" id="address" value="{{ old('address',$user->address) }}">
                <div class="error">
                    @error('address')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="form-group_label" for="building">建物名</label>
                <input class="form-group_input" type="building" name="building" id="building" value="{{ old('building',$user->building) }}">
                <div class="error">
                    @error('building')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="button">更新する</button>
    </form>
</div>
@endsection