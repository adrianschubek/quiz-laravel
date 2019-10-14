<section class="hero is-link is-bold is-small">
    <div class="hero-body">
        <div class="container">
            <div class="level">
                <div class="level-left">
                    <div class="container">
                        <h1 class="title">
                            {{ $quiz->title }}
                        </h1>
                        <h2 class="subtitle has-text-weight-light">
                            von <a class="has-text-warning has-text-weight-normal"
                                   href="{{ route('profiles.show', $quiz->user) }}">{{ $quiz->user->name }}</a>
                            @if($quiz->user->isAdmin())
                                <span class="tag is-danger">Administrator</span>
                            @endif
                            - {{ $quiz->relative_created }} erstellt
                        </h2>
                    </div>
                </div>
                <div class="level-right">
                    <div class="container">
                        <div class="field is-grouped is-grouped-multiline">
                            <div class="control">
                                <div class="tags has-addons are-medium">
                                    <span class="tag is-dark"><i class="fas fa-user"></i></span>
                                    <span class="tag is-white-bis">{{ $quiz->getPlayCount() }}</span>
                                </div>
                            </div>

                            <div class="control">
                                <div class="tags has-addons are-medium">
                                    <span class="tag is-white"><i class="fas fa-heart has-text-danger"></i></span>
                                    <span class="tag is-danger">{{ $quiz->getLikesCount() }}</span>
                                </div>
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
                        <a href="{{ route('quiz.show', ["quiz" => $quiz->id, "slug" => Str::slug($quiz->title)]) }}"
                           @if($active === 'quiz') class="is-active-grey" @endif>
                            <i class="fas fa-play m-r-sm"></i> Quiz
                        </a>
                    </li>
                    <li @if($active === 'comments') class="is-active" @endif>
                        <a href="{{ route('comments.show', $quiz) }}"
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
