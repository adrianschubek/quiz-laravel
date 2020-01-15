@extends('layouts.app')

@section('title', "Meine Quizze")

@section('content')
    <section class="hero is-link is-bold">
        <div class="hero-body">
            <div class="container">
                <h1 class="has-text-white has-text-weight-light title">
                    <i class="fa fa-layer-group m-r-sm"></i>Meine Quizze
                </h1>
            </div>
        </div>
    </section>
    <div class="columns m-t-md m-b-md">
        <div class="column is-3">
        </div>
        <div class="column is-6">
            <div class="box has-background-white-bis noboxshadow">
                <div class="level">
                    <div class="level-left"><h1 class="subtitle">Quizze ({{ $user->quizzes->count() }})</h1></div>
                    <div class="level-right">
                        <a href="{{ route('quiz.create') }}" class="button is-success"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                @forelse($quizzes = $user->quizzes()->with('user')->latest()->paginate(5) as $quiz)
                    @include('layouts.quiz.edit', $quiz)
                @empty
                    <div class="box has-text-centered noborder noboxshadow has-background-white-ter">
                        Du hast noch nichts erstellt.<br>
                        <a href="{{ route('quiz.create') }}" class="button is-success m-t-sm"><i
                                class="fa fa-plus m-r-sm"></i>
                            Erstelle dein erstes Quiz</a>
                    </div>
                @endforelse
                {{ $quizzes->links() }}
            </div>
            @if(!$user->quizzes()->onlyTrashed()->get()->isEmpty())
                <div class="box has-background-white-bis noboxshadow">
                    <div class="level">
                        <div class="level-left"><h1 class="subtitle">Gelöschte Quizze</h1></div>
                        <div class="level-right">
                        </div>
                    </div>
                    @forelse($user->quizzes()->onlyTrashed()->get() as $quiz)
                        @include('layouts.quiz.edit', $quiz)
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
