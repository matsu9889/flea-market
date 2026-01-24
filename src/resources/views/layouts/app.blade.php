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
        <div class="header_space">
            <img class="header_img" src="{{ asset('images/COACHTECHヘッダーロゴ.png') }}" alt="COACHTECH">
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>

</html>