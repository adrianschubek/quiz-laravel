@extends('layouts.app')

@section('title', "$quiz->title Kommentare")

@section('content')

    @include('layouts.quiz-hero', ['active' => 'comments'])

    <div class="container m-b-lg m-t-lg">

        @can('create', \App\Comment::class)
            <article class="media">
                <figure class="media-left">
                    <i class="far fa-user fa-2x"></i>
                </figure>
                <div class="media-content">
                    <form action="{{ route('comments.store') }}" method="post">
                        @csrf
                        <div class="field">
                            <p class="control">
                            <textarea name="comment" class="textarea @error('comment') is-danger @enderror"
                                      placeholder="Dein Kommentar...">{{ old('comment') }}</textarea>
                            </p>
                        </div>
                        <nav class="level">
                            <div class="level-left">
                                <div class="level-item">
                                    <button class="button is-info"><i class="fas fa-paper-plane m-r-sm"></i>
                                        Kommentieren
                                    </button>
                                </div>
                            </div>
                        </nav>
                        @error('comment')
                        <div class="notification is-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </form>
                </div>
            </article>
        @else
            <article class="message">
                <div class="message-body">
                    Melde dich an um Kommentare zu schreiben.
                </div>
            </article>
        @endcan
        @forelse($comments as $comment)
            @include('layouts.comment', compact('comment'))
        @empty
            <article class="message is-info m-t-md">
                <div class="message-body">
                    <i class="fas fa-comment-slash m-r-sm"></i> Keine Kommentare vorhanden.
                </div>
            </article>
        @endforelse
        <div class="m-t-sm"></div>
        {{ $comments->links() }}
    </div>
@endsection
