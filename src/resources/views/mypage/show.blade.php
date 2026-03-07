@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('content')
<form action="/mypage" method="GET">
    <div class="profile">
        <div class="profile__image-area">
            <img class="profile__image" src="{{ asset('storage/' . $user->image) }}" alt="プロフィール画像">
        </div>
        <div class="profile__user-name">
            <h2>{{ $user->user_name }}</h2>
        </div>
        <div class="profile__link">
            <a class="profile__link-edit" href="/mypage/profile">プロフィールを編集</a>
        </div>
    </div>


    <div class="tab-buttons">
        <button type="button" class="tab-button active" data-tab="listing">出品した商品</button>
        <button type="button" class="tab-button" data-tab="purchase">購入した商品</button>
    </div>
    <div class="tab-contents">
        <!-- 出品画面 -->
        <div class="tab-content active" id="listing">
            <div class="listing-container">
                @foreach($listingItems as $listingItem)
                <div class="listing-item">
                    <div class="listing-item__image-area">
                        <img class="listing-item__image" src="{{ asset('storage/' . $listingItem->img_url) }}" alt="商品画像">
                    </div>
                    <p class="listing-item-name">{{ $listingItem->item_name }}</p>
                </div>
                @endforeach
            </div>
        </div>
        <!-- 購入画面 -->
        <div class="tab-content" id="purchase">
            <div class="purchase-container">
                @foreach($purchaseItems as $purchaseItem)
                <div class="purchase-item">
                    <div class="purchase-item__image-area">
                        <img class="purchase-item__image" src="{{ asset('storage/' . $purchaseItem->img_url) }}" alt="商品画像">
                    </div>
                    <p class="purchase-item-name">{{ $purchaseItem->item_name }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</form>

<script>
    document.querySelectorAll('.tab-button').forEach(button => {
        button.addEventListener('click', function() {
            document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
            document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));

            this.classList.add('active');
            const tabName = this.dataset.tab;
            document.getElementById(tabName).classList.add('active');
        });
    });
</script>
@endsection