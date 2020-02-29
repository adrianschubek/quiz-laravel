@extends('layouts.app')

@section('title', "Meine Lieblingsquizze")

@section('content')
    <section class="hero is-danger is-bold">
        <div class="hero-body">
            <div class="container">
                <h1 class="has-text-weight-light title">
                    <i class="fas fa-heart m-r-sm "></i> Meine Lieblingsquizze ({{ $quizzes->total() }})
                </h1>
            </div>
        </div>
    </section>
    <div class="columns m-t-md">
        <div class="column is-3"></div>
        <div class="column is-6">
            @forelse($quizzes as $quiz)
                @include('layouts.quiz.quiz', $quiz)
            @empty
                <article class="message">
                    <div class="message-body">
                        Du hast noch nichts geliked.
                    </div>
                </article>
            @endforelse
            {{ $quizzes->links() }}
            <br>
        </div>
        <div class="column is-3"></div>
    </div>
@endsection
