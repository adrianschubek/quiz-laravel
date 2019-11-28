<a class="box"
   href="{{ route('quiz.show', ["quiz" => $quiz->id, "slug" => Str::slug($quiz->title)] ) }}">
    <p class="subtitle m-b-none">{{ $quiz->title }}</p>
    <div class="level m-b-sm">
        <div class="level-left">
            <small class="has-text-weight-light">von
                <span class="has-text-weight-medium">
                    {{ $quiz->user->name }}
                </span>
                | erstellt {{ $quiz->relative_created }}
            </small>
        </div>
        <div class="level-right">
            <p class="m-r-sm has-text-weight-bold"><i
                    class="far fa-play-circle"></i> {{ $quiz->getPlayCount() }}
            </p>
            <p class="has-text-weight-bold"><i class="far fa-heart"></i> {{ $quiz->getLikesCount() }}</p>
        </div>
    </div>
    <hr class="m-t-none">
    <p class="has-text-weight-light">{{ $quiz->getShortDescription() }}</p>
</a>
