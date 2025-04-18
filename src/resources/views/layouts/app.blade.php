<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PiGly')</title>

    {{-- 共通CSS --}}
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @isset($css)
        <link rel="stylesheet" href="{{ asset("css/{$css}") }}">
    @endisset
    @yield('css') {{-- ここで各Bladeから個別CSSを読み込める --}}
</head>

<body>
    <header class="app-header">
        <div class="header-left">
            <h1 class="logo"><a href="{{ route('dashboard') }}">PiGly</a></h1>
        </div>
        <nav class="header-right">
            <a href="{{ route('target_weight.edit') }}">目標体重設定</a>
            <a href="{{ route('logout') }}">ログアウト</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="app-footer">
        <p>&copy; 2025 PiGly</p>
    </footer>
</body>

</html>