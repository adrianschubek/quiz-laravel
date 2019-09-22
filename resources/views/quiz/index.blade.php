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
@endsection
