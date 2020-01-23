@extends('layouts.app')

@section('title', "$quiz->title")

@push('head')
    @livewireStyles
@endpush

@push('scripts')
    @livewireScripts
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
        <div class="columns is-centered is-desktop">
            <div class="column is-half">
                @livewire('question', $quiz)
            </div>
            <div class="column is-one-quarter">
                <div class="box shadow1 m-b-none rbl-0 rbr-0" style="background: hsl(0, 0%, 96%);">
                    <form action="{{ route('quiz.like', $quiz) }}" method="post"
                          onsubmit="button.disabled = true;button.classList.add('is-loading')">
                        @csrf
                        @auth
                            @can('like', $quiz)
                                <button name="button" class="button is-danger grow">
                                    <i class="fas fa-heart m-r-sm"></i>Mag ich
                                </button>
                            @else
                                <button name="button" class="button is-danger skew-forward" disabled>
                                    <i class="fas fa-check m-r-sm"></i>Dir gefällt dieses Quiz
                                </button>
                            @endcannot
                        @elseguest
                            <p>Melde dich an um zu bewerten</p>
                        @endauth
                    </form>
                </div>
                <div class="box rtl-0 rtr-0 noboxshadow">
                    <small class="has-text-weight-light">Beschreibung</small><br>
                    {{ $quiz->description }}
                </div>
            </div>
        </div>
        <div class="box shadow1 m-b-sm">
            <nav class="level">
                <div class="level-item has-text-centered">
                    <div>
                        <p class="heading">Erstellt am</p>
                        <p>{{ $quiz->getCreatedAtDate() }}</p>
                    </div>
                </div>
                <div class="level-item has-text-centered">
                    <div>
                        <p class="heading">Aktualisiert am</p>
                        <p>{{ $quiz->getUpdatedAtDate() }}</p>
                    </div>
                </div>
                <div class="level-item has-text-centered">
                    <div>
                        <p class="heading">Gefällt</p>
                        <p class="is-family-code">{{ $quiz->getLikesCount() }}</p>
                    </div>
                </div>
                <div class="level-item has-text-centered">
                    <div>
                        <p class="heading">Gespielt</p>
                        <p class="is-family-code">{{ $quiz->getPlayCount() }}</p>
                    </div>
                </div>
            </nav>
        </div>
    </div>
@endsection
