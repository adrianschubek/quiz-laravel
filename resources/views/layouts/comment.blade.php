<article class="media">
    <a class="media-left" href="{{ route('profiles.show', [$comment->user, $comment->user->name]) }}"
       id="{{ $comment->id }}">
        @if(auth()->user()->id === $comment->user->id)
            <i class="far fa-user fa-2x has-text-info"></i>
        @else
            <i class="far fa-user fa-2x has-text-grey-light"></i>
        @endif
    </a>
    <div class="media-content">
        <div class="content">
            <p>
                <a href="{{ route('profiles.show', [$comment->user, $comment->user->name]) }}"
                   class="has-text-dark"><strong>{{ $comment->user->name }}</strong></a>
                <small><span class="has-text-weight-light">#{{ $comment->id }}</span> {{ $comment->relative_created }}
                </small>
                <br>
                {{ $comment->comment }}
            </p>
        </div>
        <nav class="level is-mobile">
            <div class="level-left">
                <a class="level-item has-text-dark" href="#{{ $comment->id }}">
                    <span class="icon is-small"><i class="fas fa-link"></i></span>
                </a>
                <div class="level-item">
                    @auth
                        <form action="{{ route('comments.like', [$comment->quiz, $comment]) }}" method="post">
                            @csrf
                            <button class="button is-small @can('like', $comment) is-light @else is-danger @endcan"
                                    @cannot('like', $comment) disabled @endcannot>
                                <span class="icon is-small m-r-sm"><i class="fas fa-heart"></i></span>
                                {{ $comment->likes_count }}
                            </button>
                        </form>
                    @elseguest
                        <i class="fas fa-heart m-r-sm has-text-link"></i> {{ $comment->likes_count }}
                    @endauth
                </div>
            </div>
        </nav>
    </div>
    <div class="media-right">
        {{--        <button class="delete"></button>--}}
    </div>
</article>
