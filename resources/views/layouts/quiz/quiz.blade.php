<a class="box shrink-sm"
   href="{{ route('quiz.show', [$quiz, $quiz->getSlug()]) }}">
    <p class="subtitle m-b-none">{{ $quiz->title }}</p>
    <div class="level m-b-sm">
        <div class="level-left">
            <small class="has-text-weight-light">von
                <span class="has-text-weight-medium">
                    {{ $quiz->user->name }}
                </span>
                | {{ $quiz->relative_created }}
            </small>
        </div>
        <div class="level-right">
            <div class="m-l-sm field is-grouped is-grouped-multiline">
                <div class="control">
                    <div class="tags has-addons">
                        <span class="tag is-info is-light"><i class="fas fa-play"></i></span>
                        <span class="tag is-info is-light">{{ $quiz->getPlayCount() }}</span>
                    </div>
                </div>
                <div class="control">
                    <div class="tags has-addons">
                        <span class="tag is-danger is-light"><i class="fas fa-heart"></i></span>
                        <span class="tag is-danger is-light">{{ $quiz->getLikesCount() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="m-t-none">
    <p class="has-text-weight-light">{{ $quiz->getShortDescription() }}</p>
</a>
