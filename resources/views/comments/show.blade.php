@extends('layouts.app')

@section('title', "$quiz->title Kommentare")

@section('content')

    @include('layouts.quiz.hero', ['active' => 'comments'])

    <div class="container m-b-lg m-t-lg">
        <div class="columns is-centered">
            <div class="column is-half">
                @if(session('ok'))
                    <article class="message is-success">
                        <div class="message-body">
                            {{ session('ok') }}
                        </div>
                    </article>
                @elseif(session('error'))
                    <article class="message is-danger">
                        <div class="message-body">
                            {{ session('error') }}
                        </div>
                    </article>
                @endif

                @can('create', \App\Comment::class)
                    <article class="media">
                        <figure class="media-left">
                            <canvas width="50" height="50" data-jdenticon-value="{{ auth()->user()->name }}"></canvas>
                        </figure>
                        <div class="media-content">
                            <form action="{{ route('comments.store', [$quiz, $quiz->getSlug()]) }}" method="post"
                                  onsubmit="button.disabled = true;button.classList.add('is-loading')">
                                @csrf
                                <div class="field">
                                    <p class="control">
                            <textarea class="textarea @error('comment') is-danger @enderror" name="comment"
                                      placeholder="Dein Kommentar..."
                                      style="min-height: 5em !important;">{{ old('comment') }}</textarea>
                                    </p>
                                </div>
                                <nav class="level">
                                    <div class="level-left"></div>
                                    <div class="level-right">
                                        <div class="level-item">
                                            <button name="button" class="button is-info"><i
                                                    class="fas fa-paper-plane m-r-sm"></i>
                                                Kommentieren
                                            </button>
                                        </div>
                                    </div>
                                </nav>
                                @error('comment')
                                <article class="message is-danger">
                                    <div class="message-body">
                                        {{ $message }}
                                    </div>
                                </article>
                                @enderror
                            </form>
                        </div>
                    </article>
                @else
                    <article class="message">
                        <div class="message-body">
                            Melde dich an, um Kommentare zu schreiben.
                        </div>
                    </article>
                @endcan
                @forelse($comments as $comment)
                    @include('layouts.comment.comment', compact('comment'))
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
        </div>
    </div>
@endsection
