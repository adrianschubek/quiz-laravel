@extends('layouts.app')

@section('title', "Meine Lieblingsquizze")

@section('content')
    <section class="hero is-light is-bold">
        <div class="hero-body">
            <div class="container">
                <h1 class="has-text-weight-light title">
                    <i class="fas fa-bell m-r-sm "></i> Benachrichtigungen ({{ $notifications->total() }})
                </h1>
            </div>
        </div>
    </section>
    <div class="columns m-t-md">
        <div class="column is-3"></div>
        <div class="column is-6">
            @forelse($notifications as $not)
                @switch($not->type)
                    @case(\App\Notifications\QuizLiked::class)
                    <div class="message is-link">
                        <div class="message-body">
                            <i class="fas fa-heart"></i>
                            {{ $not->data["desc"] }}
                            <a class="is-pulled-right" href="{{ $not->data["link"] }}">Ansehen</a>
                        </div>
                    </div>
                    @break
                    @default

                @endswitch
            @empty
                <article class="message">
                    <div class="message-body">
                        <i class="fas fa-ghost m-r-sm"></i>Nichts vorhanden
                    </div>
                </article>
            @endforelse
            {{ $notifications->links() }}
            <br>
        </div>
        <div class="column is-3"></div>
    </div>
@endsection
