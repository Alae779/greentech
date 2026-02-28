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
                @can('access_dashboard')
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                @endcan
                @guest
                <li><a href="{{ route('login_form') }}">Login</a></li>
                <li><a href="{{ route('register_form') }}">Inscription</a></li>
                @endguest
                @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <li><button type="submit">Log Out</button></li>
                </form>
                <li><a href="{{ route('show_favoris') }}">Mes Favoris</a></li>
                <li><a href="{{ route('show_users') }}">Users</a></li>
                <li><a href="{{ route('show_roles') }}">Roles</a></li>
                @endauth
            </ul>
        </nav>
    </header>
    <main>