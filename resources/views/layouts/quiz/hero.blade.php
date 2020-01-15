<section class="hero is-link is-bold is-small">
    <div class="hero-body">
        <div class="container">
            <div class="level">
                <div class="level-left">
                    <div class="container">
                        <h1 class="title m-b-none">
                            {{ $quiz->title }}
                        </h1>
                        <span class="subtitle has-text-weight-light">von</span>
                        <a class="tag is-link is-light"
                           href="{{ route('profiles.show', $quiz->user) }}">
                            {{ $quiz->user->name }}</a>
                        @if($quiz->user->isAdmin())
                            <span class="tag is-danger">Administrator</span>
                        @endif
                        <span class="has-text-weight-light">
                        - {{ $quiz->relative_created }} erstellt
                        </span>
                    </div>
                </div>
                <div class="level-right">
                    <div class="container">
                        <div class="field is-grouped is-grouped-multiline">
                            <div class="control">
                                <div class="tags has-addons are-medium">
                                    <span class="tag is-dark"><i class="fas fa-play"></i></span>
                                    <span class="tag is-white">{{ $quiz->getPlayCount() }}</span>
                                </div>
                            </div>

                            <div class="control">
                                <a class="tags has-addons are-medium shrink"
                                   href="{{ route('quiz.likedby', [$quiz, $quiz->getSlug()]) }}">
                                    <span class="tag is-white"><i class="fas fa-heart has-text-danger"></i></span>
                                    <span class="tag is-danger">{{ $quiz->getLikesCount() }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="hero-foot">
        <nav class="tabs is-boxed is-fullwidth">
            <div class="container">
                <ul>
                    <li @if($active === 'quiz') class="is-active" @endif>
                        <a href="{{ route('quiz.show', [$quiz->id, $quiz->getSlug()]) }}"
                           @if($active === 'quiz') class="is-active-grey" @endif>
                            <i class="fas fa-play m-r-sm"></i> Quiz
                        </a>
                    </li>
                    <li @if($active === 'comments') class="is-active" @endif>
                        <a href="{{ route('comments.show',[$quiz, $quiz->getSlug()]) }}"
                           @if($active === 'comments') class="is-active-grey" @endif>
                            <i class="fas fa-comments m-r-sm"></i>
                            Kommentare<span class="tag is-white m-l-sm">{{ $quiz->comments->count() }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profiles.show', $quiz->user) }}"><i class="fas fa-user m-r-sm"></i> Mehr
                            von {{ $quiz->user->name }}</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</section>
