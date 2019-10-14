<article class="media">
    <a class="media-left" href="{{ route('profiles.show', [$comment->user, $comment->user->name]) }}">
        <i class="far fa-user fa-2x has-text-grey-light"></i>
    </a>
    <div class="media-content">
        <div class="content">
            <p>
                <a href="{{ route('profiles.show', [$comment->user, $comment->user->name]) }}"
                   class="has-text-dark"><strong>{{ $comment->user->name }}</strong> <small>{{ $comment->relative_created }}</small></a>
                <br>
                {{ $comment->comment }}
            </p>
        </div>
        <nav class="level is-mobile">
            <div class="level-left">
                <a class="level-item">
                    <span class="icon is-small"><i class="fas fa-reply"></i></span>
                </a>
                <a class="level-item">
                    <span class="icon is-small"><i class="fas fa-retweet"></i></span>
                </a>
                <a class="level-item">
                    <span class="icon is-small"><i class="fas fa-heart"></i></span>
                </a>
            </div>
        </nav>
    </div>
    <div class="media-right">
{{--        <button class="delete"></button>--}}
    </div>
</article>
