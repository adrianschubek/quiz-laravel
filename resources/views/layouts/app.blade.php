<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="has-navbar-fixed-top">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}?v={{ config('app.version') }}" rel="stylesheet"
          data-turbolinks-track="reload">
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}?v={{ config('app.version') }}" defer data-turbolinks-track="reload"></script>
    @livewireScripts

    @stack('head')
</head>
<body>
<nav class="navbar has-shadow is-fixed-top"
     style="border-top-color: #3f51b5;border-top-width: thick;border-top-style: solid;">
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
                    <form action="{{ route('quiz.search') }}" class="m-r-sm field has-addons"
                          onsubmit="button.disabled = true;button.classList.add('is-loading')">
                        <div class="control">
                            <input class="input m-r-sm has-background-white-ter noborder noboxshadow" type="search"
                                   name="query"
                                   placeholder="Suche..."
                                   autocomplete="off"
                            >
                        </div>
                        <div class="control">
                            <button type="submit" class="button is-link " name="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                @guest
                    <div class="buttons" x-data="{ open: false, page: 1 }">
                        <button class="navbar-item button is-white" @click="open = true;page = 1">Anmelden</button>
                        <div class="modal" x-bind:class="{ 'is-active': open && page === 1 }">
                            <div class="modal-background" @click="open = false"></div>
                            <div class="modal-content">
                                <div class="box">
                                    <div class="tabs is-centered">
                                        <ul>
                                            <li class="is-active"><a>Anmelden</a></li>
                                            <li><a @click="page=2">Registrieren</a></li>
                                        </ul>
                                    </div>
                                    @include('layouts.forms.login')
                                </div>
                            </div>
                            <button class="modal-close is-large" aria-label="close" @click="open = false"></button>
                        </div>
                        <div class="modal" x-bind:class="{ 'is-active': open && page === 2 }">
                            <div class="modal-background" @click="open = false"></div>
                            <div class="modal-content">
                                <div class="box">
                                    <div class="tabs is-centered">
                                        <ul>
                                            <li><a @click="page=1">Anmelden</a></li>
                                            <li class="is-active"><a>Registrieren</a></li>
                                        </ul>
                                    </div>
                                    @include('layouts.forms.register')
                                </div>
                            </div>
                            <button class="modal-close is-large" aria-label="close" @click="open = false"></button>
                        </div>
                    </div>
            </div>
            @else
                @livewire('notifications')
                <div class="navbar-item has-dropdown is-hoverable" id="nav-user-dropdown" data-turbolinks-permanent>
                    <a class="navbar-link"
                       href="{{ route('profiles.show', [auth()->user()->id, auth()->user()->name]) }}">
                        <canvas width="40" height="40"
                                data-jdenticon-value="{{ auth()->user()->name }}"></canvas>
                        {{ auth()->user()->name }}
                    </a>
                    <div class="navbar-dropdown">
                        @auth
                            <a class="navbar-item" href="{{ route('quiz.index') }}">
                                <i class="fas fa-layer-group m-r-sm"></i> Meine Quizze
                            </a>
                        @endauth
                        <a class="navbar-item" href="{{ route('comments.index') }}">
                            <i class="fas fa-comments m-r-sm"></i> Meine Kommentare
                        </a>
                        <a class="navbar-item" href="{{ route('likes.index') }}">
                            <i class="fas fa-heart m-r-sm"></i> Lieblingsquizze
                        </a>
                        <a class="navbar-item" href="{{ route('profiles.edit', auth()->user()->id) }}">
                            <i class="fas fa-cogs m-r-sm"></i> Einstellungen
                        </a>
                        <hr class="dropdown-divider">
                        <a class="navbar-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt m-r-sm"></i> Abmelden
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            @endguest
        </div>
    </div>
</nav>
@yield('nav')
<main>
    @yield('content')
</main>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 319" preserveAspectRatio="none"
     style="display: inherit; overflow: hidden"
     height="60px" width="100%">
    <path fill="#273036" fill-opacity="1"
          d="M0,288L40,266.7C80,245,160,203,240,197.3C320,192,400,224,480,229.3C560,235,640,213,720,202.7C800,192,880,192,960,213.3C1040,235,1120,277,1200,266.7C1280,256,1360,192,1400,160L1440,128L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path>
</svg>
<footer class="footer m-b-none p-b-md p-t-md" style="background-color: #273036">
    <div class="has-text-centered has-text-grey-light">
        <p>
            <strong class="has-text-grey-light">Quiz</strong> programmiert von <i>Adrian Schubek</i> &copy; 2020 mit
            Laravel in PHP.
        </p>
    </div>
</footer>

<!-- Scripts -->
@stack('scripts')
</body>
</html>
