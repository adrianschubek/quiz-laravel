@extends('layouts.app')

@section('title', "$profile->name's Profil")

@section('content')
    <section class="hero is-info is-bold">
        <div class="hero-body">
            <div class="container">
                <h1 class="has-text-weight-light title">
                    <i class="far fa-user-circle m-r-sm "></i>{{ $profile->name }}
                    @if($profile->isAdmin())
                        <span class="tag is-danger">Administrator</span>
                    @endif
                </h1>
            </div>
        </div>
    </section>
    <div class="columns m-t-md">
        <div class="column is-3">
        </div>
        <div class="column is-6">
            <div class="box has-background-white shadow1">
                <div class="columns">
                    <div class="column">
                        @if($profile->last_login_at)
                            <p>
                                <span class="has-text-weight-light">Zuletzt angemeldet </span>
                                <i class="fas fa-signal has-text-grey"></i>
                                {{ \Carbon\Carbon::parse($profile->last_login_at)->fromNow() }}
                            </p>
                        @endif
                        <p>
                            <span class="has-text-weight-light">Mitglied seit </span>
                            <i class="fas fa-birthday-cake has-text-grey"></i>
                            {{ \Carbon\Carbon::parse($profile->created_at)->format('d.m.Y') }}
                        </p>
                    </div>
                    <div class="column is-narrow">
                        @can('update', $profile)
                            <a href="{{ route('profiles.edit', $profile) }}" class="button is-warning"><i
                                    class="fas fa-pen"></i></a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="box shadow1 m-b-sm">
                <nav class="level">
                    <div class="level-item has-text-centered">
                        <div>
                            <p class="heading">Likes</p>
                            <p class="is-family-code">{{ number_format($likes, 0, ',', '.') }}</p>
                        </div>
                    </div>
                    <div class="level-item has-text-centered">
                        <div>
                            <p class="heading">Aufrufe</p>
                            <p class="is-family-code">{{ number_format($playcount, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="box has-background-white-bis noboxshadow">
                <div class="columns">
                    <div class="column">
                        <h1 class="subtitle"><i class="fas fa-layer-group"></i> Quizze ({{ $quizzes->total() }})</h1>
                    </div>
                    <div class="column is-narrow">
                        @can('update', $profile)
                            <a href="{{ route('quiz.index') }}" class="button is-warning"><i
                                    class="fas fa-pen"></i></a>
                        @endcan
                    </div>
                </div>
                @forelse($quizzes as $quiz)
                    @include('layouts.quiz.quiz', $quiz)
                @empty
                    <article class="message">
                        <div class="message-body">
                            Keine Quizze veröffentlicht.
                        </div>
                    </article>
                @endforelse
                {{ $quizzes->links() }}
            </div>
        </div>
        <div class="column is-3">
        </div>
    </div>
@endsection


