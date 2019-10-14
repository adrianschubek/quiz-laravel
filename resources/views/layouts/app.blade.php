<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @stack('head')
</head>
<body>
<nav class="navbar has-shadow">
    <div class="container">
        <div class="navbar-brand">
            <a href="{{ url('/') }}" class="navbar-item">{{ config('app.name') }}</a>

            <div class="navbar-burger burger" data-target="navMenu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div class="navbar-menu" id="navMenu">
            <div class="navbar-start"></div>

            <div class="navbar-end">
                <div class="flex centerflex">
                    <form action="{{ route('quiz.search') }}" class="m-r-sm field has-addons">
                        <div class="control">
                            <input class="input m-r-sm has-background-white-ter noborder noboxshadow" type="text"
                                   name="q"
                                   placeholder="Suche...">
                        </div>
                        <div class="control">
                            <button type="submit" class="button is-link "><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
                @guest
                    <div class="buttons">
                        <a class="navbar-item button is-white" href="{{ route('login') }}">Anmelden</a>
                        <a class="navbar-item button is-dark" href="{{ route('register') }}">Registrieren</a>
                    </div>
                @else
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link"
                           href="{{ route('profiles.show', [auth()->user()->id, auth()->user()->name]) }}"><i
                                class="far fa-user-circle m-r-sm"></i> {{ Auth::user()->name }}</a>

                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="{{ route('quiz.index') }}">
                                <i class="fas fa-layer-group m-r-sm"></i> Meine Quizze
                            </a>
                            <a class="navbar-item" href="{{ 'todo' }}">
                                <i class="fas fa-comments m-r-sm"></i> Meine Kommentare
                            </a>
                            <a class="navbar-item" href="{{ route('profiles.edit', auth()->user()->id) }}">
                                <i class="fas fa-cogs m-r-sm"></i> Einstellungen
                            </a>
                            <hr class="dropdown-divider">
                            <a class="navbar-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt m-r-sm"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>
@yield('nav')
<main>
    @yield('content')
</main>
<footer class="footer has-background-black-bis m-b-none p-b-md p-t-md">
    <div class="has-text-centered has-text-grey-light">
        <p>
            <strong class="has-text-grey-light">Quiz</strong> programmiert von <i>Adrian Schubek</i> &copy; 2019 mit Laravel in PHP.
        </p>
    </div>
</footer>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
