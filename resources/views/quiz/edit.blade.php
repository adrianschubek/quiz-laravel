@extends('layouts.app')

@section('title', "$quiz->title bearbeiten")

@section('content')
    <section class="hero is-primary is-bold">
        <div class="hero-body">
            <div class="container">
                <h1 class="has-text-weight-light title">
                    {{ $quiz->title }}
                </h1>
            </div>
        </div>
    </section>
    <div class="columns m-t-md">
        <div class="column is-3">
        </div>
        <div class="column is-6">
            <div class="box has-background-white-ter">
                {{ $quiz->description }}
            </div>
            @forelse($quiz->questions()->orderBy('order', 'asc')->get() as $question)
                @include('layouts.quiz.questions.show', $question)
            @empty
                <article class="message is-danger">
                    <div class="message-body">
                        Keine Fragen vorhanden.
                    </div>
                </article>
            @endforelse
            @include('layouts.quiz.questions.create')
        </div>
        <div class="column is-3">
        </div>
    </div>
@endsection
