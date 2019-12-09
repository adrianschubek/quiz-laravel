@extends('layouts.app')

@section('title', "Startseite")

@section('content')
    @auth
        <nav class="level g2">
            <div class="level-left m-l-md">
                <section class="hero ">
                    <div class="hero-body">
                        <div class="container">
                            <h1 class="has-text-white has-text-weight-light title is-unselectable">
                                Hallo {{ auth()->user()->name }}
                            </h1>
                        </div>
                    </div>
                </section>
            </div>
            <div class="level-right m-r-md">
                <div class="dropdown m-r-sm is-hoverable">
                    <div class="dropdown-trigger">
                        <button class="button is-outlined noborder is-white" aria-haspopup="true" aria-controls="dropdown-menu">
                            <span><i class="fas fa-filter"></i> Filter</span>
                            <span class="icon is-small">
                                <i class="fas fa-angle-down" aria-hidden="true"></i>
                            </span>
                        </button>
                    </div>
                    <div class="dropdown-menu" id="dropdown-menu" role="menu">
                        <div class="dropdown-content">
                            <a href="{{ url("/") }}" class="dropdown-item">
                                <i class="fas fa-history"></i> Neue Quizze
                            </a>
                            <a href="{{ url("/?sort=plays") }}" class="dropdown-item">
                                <i class="fas fa-play"></i> Oft gespielte Quizze
                            </a>
                            <a href="{{ url("/?sort=likes") }}" class="dropdown-item">
                                <i class="fas fa-heart"></i> Beliebte Quizze
                            </a>
                        </div>
                    </div>
                </div>
                <a href="{{ route('profiles.index') }}" class="button is-light is-outlined noborder m-r-sm">
                    <i class="fas fa-users m-r-sm"></i>
                    Mitglieder
                </a>
                <a href="{{ route('stats') }}" class="button is-light is-outlined noborder m-r-sm">
                    <i class="fas fa-chart-line m-r-sm"></i>
                    Statistiken
                </a>
                <a href="{{ route('quiz.index') }}" class="button is-light is-outlined m-r-sm is-hidden-mobile">
                    <i class="fas fa-layer-group m-r-sm"></i>
                    Meine Quizze
                </a>
            </div>
        </nav>
    @endauth
    @guest
        <div class="notification is-dark">
            <button class="delete"></button>
            <i class="fas fa-user-secret"></i> Du bist nicht angemeldet. Melde dich an um Quizze erstellen und
            bewerten zu können.
        </div>
        <div class="level-right m-r-sm m-t-md">
            <div class="dropdown m-r-sm is-hoverable is-right">
                <div class="dropdown-trigger">
                    <button class="button is-outlined is-dark" aria-haspopup="true" aria-controls="dropdown-menu2">
                        <span><i class="fas fa-filter"></i> Filter</span>
                        <span class="icon is-small">
                                <i class="fas fa-angle-down" aria-hidden="true"></i>
                            </span>
                    </button>
                </div>
                <div class="dropdown-menu" id="dropdown-menu" role="menu">
                    <div class="dropdown-content">
                        <a href="{{ url("/") }}" class="dropdown-item">
                            <i class="fas fa-history"></i> Neue Quizze
                        </a>
                        <a href="{{ url("/?sort=plays") }}" class="dropdown-item">
                            <i class="fas fa-play"></i> Oft gespielte Quizze
                        </a>
                        <a href="{{ url("/?sort=likes") }}" class="dropdown-item">
                            <i class="fas fa-heart"></i> Beliebte Quizze
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endguest
    <div class="container m-t-md m-b-md">
        <div class="columns is-mobile is-multiline is-centered">
            @foreach($quizzes as $quiz)
                <div class="column is-narrow">
                    @include('layouts.quiz.quiz', $quiz)
                </div>
            @endforeach
        </div>

        {{ $quizzes->appends($_GET)->links() }}

    </div>
@endsection
