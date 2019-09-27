@extends('layouts.app')

@section('content')
    <section class="hero g1">
        <div class="hero-body">
            <div class="container">
                <h1 class="has-text-white has-text-weight-light title">
                    Meine Quizze
                </h1>
            </div>
        </div>
    </section>
    <div class="columns m-t-md m-b-md">
        <div class="column is-3">
        </div>
        <div class="column is-6">
            <div class="box has-background-white-bis">
                <div class="level">
                    <div class="level-left"><h1 class="subtitle">Quizze</h1></div>
                    <div class="level-right">
                        <a href="{{ route('quiz.create') }}" class="button is-success"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                @forelse($user->quizzes as $quiz)
                    @include('layouts.quiz-edit', $quiz)
                @empty
                    <div class="box has-text-centered noborder noboxshadow has-background-grey-lighter">
                        Du hast noch nichts erstellt.<br>
                        <a href="{{ route('quiz.create') }}" class="button is-success m-t-sm"><i
                                class="fa fa-plus m-r-sm"></i>
                            Erstelle dein erstes Quiz</a>
                    </div>
                @endforelse
            </div>
            @if(!$user->quizzes()->onlyTrashed()->get()->isEmpty())
                <div class="box has-background-white-bis">
                    <div class="level">
                        <div class="level-left"><h1 class="subtitle">Gelöschte Quizze</h1></div>
                        <div class="level-right">
                        </div>
                    </div>
                    @forelse($user->quizzes()->onlyTrashed()->get() as $quiz)
                        @include('layouts.quiz-edit', $quiz)
                    @empty
                        <div class="box has-text-centered noborder noboxshadow has-background-grey-lighter">
                            Du hast noch nichts gelöscht.
                        </div>
                    @endforelse
                </div>
            @endif
        </div>
        <div class="column is-3">
        </div>
    </div>
@endsection
