@extends('layouts.app')

@section('title', "Benachrichtigungen")

@section('content')
    <section class="hero is-light">
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
                    <div class="notification has-background-white shrink-sm" style="display: block !important;">
                        <i class="fas fa-heart has-text-danger"></i>

                        @break
                        @case(\App\Notifications\CommentLiked::class)
                        <div class="notification has-background-white shrink-sm" style="display: block !important;">
                            <i class="fas fa-heart has-text-danger"></i>
                            @break
                            @case(\App\Notifications\QuizCommented::class)
                            <div class="notification has-background-white shrink-sm" style="display: block !important;">
                                <i class="fas fa-comment"></i>
                                @break
                                @default
                                <div class="notification shrink-sm" style="display: block !important;">
                                    @endswitch
                                    {{ $not->data["desc"] }}
                                    <div class="is-pulled-right">
                                        @if(!$not->read_at)
                                            <span class="tag is-info is-light">NEU</span>
                                        @endif
                                        <a href="{{ $not->data["link"] }}">Ansehen</a>
                                    </div>

                                    <small>({{ $not->created_at->fromNow() }})</small>
                                </div>
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
