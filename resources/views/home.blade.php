@extends('layouts.app')

@section('content')
    @auth
        <nav class="level g2">
            <div class="level-left m-l-md">
                <section class="hero ">
                    <div class="hero-body">
                        <div class="container">
                            <h1 class="has-text-white has-text-weight-light title">
                                Hallo {{ auth()->user()->name }}
                            </h1>
                        </div>
                    </div>
                </section>
            </div>
            <div class="level-right m-r-md">
                <div class="dropdown m-r-sm is-hoverable">
                    <div class="dropdown-trigger">
                        <button class="button is-outlined is-white" aria-haspopup="true" aria-controls="dropdown-menu">
                            <span><i class="fas fa-filter"></i> Filter</span>
                            <span class="icon is-small">
                                <i class="fas fa-angle-down" aria-hidden="true"></i>
                            </span>
                        </button>
                    </div>
                    <div class="dropdown-menu" id="dropdown-menu" role="menu">
                        <div class="dropdown-content">
                            <a href="{{ url("/?sort=desc") }}" class="dropdown-item">
                                <i class="fas fa-history"></i> Neue Quizze
                            </a>
                            <a href="{{ url("/?sort=asc") }}" class="dropdown-item">
                                <i class="fas fa-history"></i> Ältere Quizze
                            </a>
                            <a href="{{ url("/?sort=desc&type=play") }}" class="dropdown-item">
                                <i class="fas fa-play"></i> Oft gespielte Quizze
                            </a>
                            <a href="{{ url("/?sort=asc&type=play") }}" class="dropdown-item">
                                <i class="fas fa-play"></i> Selten gespielte Quizze
                            </a>
                        </div>
                    </div>
                </div>
                <a href="{{ route('stats') }}" class="button is-info is-outlined m-r-sm"><i
                        class="fas fa-chart-line m-r-sm"></i>
                    Statistiken </a>
                <a href="{{ route('quiz.create') }}" class="button is-success is-outlined m-r-sm"><i
                        class="fas fa-plus m-r-sm"></i>
                    Quiz erstellen</a>
            </div>
        </nav>
    @endauth
    @guest
        <div class="notification">
            <button class="delete"></button>
            <i class="fas fa-user-secret"></i> Du bist nicht angemeldet. Klicke <a href="{{ route('login') }}">hier</a>
            um dich anzumelden.
        </div>
        <div class="level-right m-r-sm">
            <div class="dropdown m-r-sm is-hoverable is-right">
                <div class="dropdown-trigger">
                    <button class="button is-outlined is-dark" aria-haspopup="true" aria-controls="dropdown-menu2">
                        <span><i class="fas fa-filter"></i> Filter</span>
                        <span class="icon is-small">
                                <i class="fas fa-angle-down" aria-hidden="true"></i>
                            </span>
                    </button>
                </div>
                <div class="dropdown-menu" id="dropdown-menu2" role="menu">
                    <div class="dropdown-content">
                        <a href="{{ url("/?sort=desc") }}" class="dropdown-item">
                            <i class="fas fa-history"></i> Neue Quizze
                        </a>
                        <a href="{{ url("/?sort=asc") }}" class="dropdown-item">
                            <i class="fas fa-history"></i> Ältere Quizze
                        </a>
                        <a href="{{ url("/?sort=desc&type=play") }}" class="dropdown-item">
                            <i class="fas fa-play"></i> Oft gespielte Quizze
                        </a>
                        <a href="{{ url("/?sort=asc&type=play") }}" class="dropdown-item">
                            <i class="fas fa-play"></i> Selten gespielte Quizze
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
                    <a class="box"
                       href="{{ route('quiz.show', ["quiz" => $quiz->id, "slug" => Str::slug($quiz->title)] ) }}">
                        <p class="subtitle m-b-none">{{ $quiz->title }}</p>
                        <div class="level m-b-sm">
                            <div class="level-left">
                                <small class="has-text-weight-light">von
                                    <span class="has-text-weight-medium">
                                {{ $quiz->user->name }}
                            </span>
                                    | {{ \Carbon\Carbon::parse($quiz->created_at)->fromNow() }}
                                </small>
                            </div>
                            <div class="level-right">
                                <p class="m-r-sm has-text-weight-bold"><i
                                        class="far fa-user"></i> {{ number_format($quiz->play_count, 0 , ',' , '.' ) }}
                                </p>
                                <p class="has-text-weight-bold"><i class="far fa-heart"></i> 74%</p>
                            </div>
                        </div>
                        <hr class="m-t-none">
                        <p class="has-text-weight-light">{{ Str::limit($quiz->description, 50) }}</p>
                    </a>
                </div>
            @endforeach
        </div>

        {{ $quizzes->appends($_GET)->links() }}

    </div>
@endsection
