@extends('layouts.app')

@section('title', "Meine Kommentare")

@section('content')
    <section class="hero is-info is-bold">
        <div class="hero-body">
            <div class="container">
                <h1 class="has-text-weight-light title">
                    <i class="fas fa-comments m-r-sm "></i> Meine Kommentare ({{ $comments->total() }})
                </h1>
            </div>
        </div>
    </section>
    <div class="columns m-t-md">
        <div class="column is-3"></div>
        <div class="column is-6">
            @forelse($comments as $comment)
                <div class="box shadow1">
                    <div class="columns">
                        <div class="column">
                            @include('layouts.comment.comment',compact('comment'))
                        </div>
                        <div class="column is-narrow">
                            <a class="button is-light"
                               href="{{ route('comments.show',[$comment->quiz, $comment->quiz->getSlug(), '#'.$comment->id ]) }}">
                                <i class="far fa-eye m-r-sm"></i> Anzeigen
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <article class="message">
                    <div class="message-body">
                        Du hast noch nichts kommentiert.
                    </div>
                </article>
            @endforelse
            {{ $comments->links() }}
            <br>
        </div>
        <div class="column is-3"></div>
    </div>
@endsection
