@extends('layouts.app')

@section('title', "$quiz->title")

@push('scripts')
    @livewireAssets
@endpush

@section('content')

    @include('layouts.quiz.hero', ['active' => 'quiz'])

    <div class="container m-t-md">

        @if(session('ok'))
            <article class="message is-success">
                <div class="message-body">
                    <i class="fas fa-check"></i> {{ session('ok') }}
                </div>
            </article>
        @elseif(session('error'))
            <article class="message is-danger">
                <div class="message-body">
                    {{ session('error') }}
                </div>
            </article>
        @endif

        <div class="box shadow1">
            <div class="columns">
                <div class="column">
                    {{ $quiz->description }}
                </div>
                <div class="column is-narrow">
                    <form action="{{ route('quiz.like', $quiz) }}" method="post"
                          onsubmit="button.disabled = true;button.classList.add('is-loading')">
                        @csrf
                        <button name="button" class="button is-danger" @cannot('like', $quiz) disabled @endcannot>
                            <i class="fas fa-heart m-r-sm"></i>Mag ich
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="columns is-centered">
            <div class="column is-half">
                @livewire('question', $quiz)
            </div>
        </div>
    </div>
@endsection
