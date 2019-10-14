@extends('layouts.app')

@section('title', "$quiz->title")

@section('content')

    @include('layouts.quiz-hero', ['active' => 'quiz'])

    <div class="container m-t-md">

        @if(session('ok'))
            <article class="message is-success">
                <div class="message-body">
                   <i class="fas fa-check"></i>  {{ session('ok') }}
                </div>
            </article>
        @elseif(session('error'))
            <article class="message is-danger">
                <div class="message-body">
                    {{ session('error') }}
                </div>
            </article>
        @endif

        <div class="box noboxshadow border">
            <div class="columns">
                <div class="column">
                    {{ $quiz->description }}
                </div>
                <div class="column is-narrow">
                    <form action="{{ route('quiz.like', $quiz) }}" method="post">
                        @csrf
                        <button class="button is-danger" @cannot('like', $quiz) disabled @endcannot>
                            <i class="fas fa-heart m-r-sm"></i>Mag ich
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
