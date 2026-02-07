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
            <img class="header_img" src="{{ asset('images/COACHTECHヘッダーロゴ.png') }}" alt="COACHTECH">
        </div>
        @if (Auth::check())

        <ul class="header-nav">
            <li class="header-nav__item">
                <form action="find" method="POST">
                    @csrf
                    <input class="header-nav__" input type="text" name="input" value="" placeholder="なにをお探しですか？">
                </form>
            </li>
            <li class="header-nav__item">
                <form action="/logout" method="post">
                    @csrf
                    <button class="header-nav__logout">ログアウト</button>
                </form>
            </li>
            <li class="header-nav__item">
                <a class="header-nav__mypage" href="/mypage">マイページ</a>
            </li>
            <li class="header-nav__item">
                <a class="header-nav__listing" href="">出品</a>
            </li>
        </ul>
        @endif
    </header>
    <main>
        @yield('content')
    </main>
</body>

</html>