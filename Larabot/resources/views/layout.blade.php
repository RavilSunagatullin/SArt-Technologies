<!DOCTYPE html>
<html lang="ru}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <link rel="stylesheet" href="{{asset('style.css')}}">
</head>
<body>
<header class="header">
    <a href="{{route('welcome')}}" class="header__nav-link">
        Larabot
    </a>
    <nav class="header__nav">
        <ul class="header__nav-list">

            @auth
                <li class="header__nav-item">
                    <a href="{{route('admin')}}" class="header__nav-link">Admin panel</a>
                </li>
                <li class="header__nav-item">
                    <form method="POST" action="{{ route('logout') }}" class="text-center">
                        @csrf
                        <button type="submit" class="header__nav-link">выйти</button>
                    </form>
                </li>
            @else
                <li class="header__nav-item">
                    <a href="{{route('login')}}" class="header__nav-link">Login</a>
                </li>
            @endauth
        </ul>
    </nav>
</header>
<main style="padding: 0 10px">
    @yield('content')
</main>
</body>
</html>
