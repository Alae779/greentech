<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenTech Solutions - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('js/app.js') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>
    <header>
        <nav>
            <div class="logo">🌱 GreenTech Solutions</div>
            <ul class="nav-links">
                <li><a href="/">Accueil</a></li>
                @guest
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Inscription</a></li>
                @endguest
                @auth
                <form method="POST" action="/logout">
                    @csrf
                    <li><button type="submit">Log Out</button></li>
                </form>
                <li><a href="/favoris">Mes Favoris</a></li>
                @endauth
            </ul>
        </nav>
    </header>
    <main>