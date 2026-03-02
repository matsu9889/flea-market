<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>coachtechフリマ</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header_logo">
            <a href="/">
                <img class="header_img" src="{{ asset('images/COACHTECHヘッダーロゴ.png') }}" alt="COACHTECH">
            </a>
        </div>

        <form action="/" method="GET">
            <input class="header-nav__search" type="text" name="keyword" value="{{ request('keyword') }}" placeholder="なにをお探しですか？">
        </form>

        <ul class="header-nav">
            <li class="header-nav__item">
                @auth
                <form action="/logout" method="post">
                    @csrf
                    <button class="header-nav__logout">ログアウト</button>
                </form>
                @else
                <a href="/login">
                    <button class="header-nav__login">ログイン</button>
                </a>
                @endauth
            </li>
            <li class="header-nav__item">
                <a class="header-nav__mypage" href="/mypage">マイページ</a>
            </li>
            <li class="header-nav__item">
                <a class="header-nav__listing" href="/sell">出品</a>
            </li>
        </ul>

    </header>
    <main>
        @yield('content')
    </main>
</body>

</html>