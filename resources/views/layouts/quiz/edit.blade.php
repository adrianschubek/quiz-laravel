<div class="box">
    <a class="subtitle m-b-none "
       href="{{ route('quiz.show', ["quiz" => $quiz->id, "slug" => Str::slug($quiz->title)] ) }}">{{ $quiz->title }}</a>
    <div class="level m-b-sm">
        <div class="level-left">
            <small class="has-text-weight-light">von
                <a class="has-text-weight-medium" href="{{ route("profiles.show", $quiz->user) }}">
                    {{ $quiz->user->name }}
                </a>
                | erstellt {{ $quiz->relative_created }}
            </small>
            <div class="tags has-addons m-l-sm">
                @if($quiz->trashed())
                    <span class="tag is-danger is-light">Gelöscht</span>
                @else
                    @if(!$quiz->isPrivate())
                        <span class="tag is-success is-light">Veröffentlicht</span>
                    @else
                        <span class="tag is-warning is-light">Privat</span>
                        <span class="tag is-light">Keine Fragen erstellt</span>
                    @endif
                @endif
            </div>
        </div>
        <div class="level-right">
            <p class="m-r-sm has-text-weight-bold"><i
                    class="far fa-user"></i> {{ $quiz->getPlayCount() }}
            </p>
            <p class="has-text-weight-bold"><i class="far fa-heart"></i> {{ $quiz->getLikesCount() }}</p>
        </div>
    </div>
    <hr class="m-t-none">

    <div class="level">
        <div class="level-left"><p class="has-text-weight-light">{{ $quiz->getShortDescription() }}</p></div>
        <div class="level-right">
            @if(!$quiz->trashed())
                @can('update', $quiz)
                    <a href="{{route('quiz.edit', $quiz)}}" class="button is-warning m-r-sm">
                        <i class="fas fa-pen m-r-sm"></i> Bearbeiten</a>
                @endcan
                @can('delete', $quiz)
                    <form action="{{ route('quiz.destroy', $quiz) }}" method="post"
                          onsubmit="delbtn.disabled = true;delbtn.classList.add('is-loading')">
                        @csrf
                        @method('delete')
                        <button name="delbtn" class="button has-text-danger is-text">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                @endcan
            @else
                @can('restore', $quiz)
                    <form action="{{ route('quiz.restore', $quiz->id) }}" method="post"
                          onsubmit="resbtn.disabled = true;resbtn.classList.add('is-loading')">
                        @csrf
                        @method('put')
                        <button name="resbtn" class="button is-success m-r-sm">
                            <i class="fas fa-undo m-r-sm"></i> Wiederherstellen
                        </button>
                    </form>
                @endcan
                @can('forceDelete', $quiz)
                    <form action="{{ route('quiz.force-delete', $quiz->id) }}" method="post"
                          onsubmit="fbtn.disabled = true;fbtn.classList.add('is-loading')">
                        @csrf
                        @method('delete')
                        <button name="fbtn" class="button has-text-danger is-text">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                @endcan
            @endif
        </div>
    </div>
</div>
