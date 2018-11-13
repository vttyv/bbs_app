<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>

        <script src="{{asset('js/app.js') }}"></script>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bbs.css') }}" rel="stylesheet">
    </head>
    <body>
        <header>
            <h1>掲示板</h1>
        </header>
        <main>
            @yield('content')
        </main>
    </body>
</html>
