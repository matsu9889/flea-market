@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="container">
    <!-- <form action="/" method="GET"> -->
    <div class="tab-buttons">
        <button type="button" class="tab-button active" data-tab="recommend">おすすめ</button>
        <button type="button" class="tab-button" data-tab="mylist">マイリスト</button>
    </div>

    <div class="tab-contents">
        <!-- おすすめタブ -->
        <div class="tab-content active" id="recommend">
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
        </div>

        <!-- マイリストタブ -->
        <div class="tab-content" id="mylist">
            <div class="item_container">
                <p>マイリストの商品がここに表示されます</p>
            </div>
        </div>
    </div>
    <!-- </form> -->
</div>

<!-- JavaScript -->
<script>
    document.querySelectorAll('.tab-button').forEach(button => {
        button.addEventListener('click', function() {
            document.querySelectorAll('.tab-button').forEach(btn => {
                btn.classList.remove('active');
            });

            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.remove('active');
            });

            this.classList.add('active');

            const tabName = this.dataset.tab;
            document.getElementById(tabName).classList.add('active');
        });
    });
</script>
@endsection