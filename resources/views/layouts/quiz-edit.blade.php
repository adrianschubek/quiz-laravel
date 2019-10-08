<div class="box">
    <a class="subtitle m-b-none "
       href="{{ route('quiz.show', ["quiz" => $quiz->id, "slug" => Str::slug($quiz->title)] ) }}">{{ $quiz->title }}</a>
    <div class="level m-b-sm">
        <div class="level-left">
            <small class="has-text-weight-light">von
                <a class="has-text-weight-medium" href="{{ route("profiles.show", $quiz->user) }}">
                    {{ $quiz->user->name }}
                </a>
                | erstellt {{ \Carbon\Carbon::parse($quiz->created_at)->fromNow() }}
            </small>
            <div class="tags has-addons m-l-sm">
                <span class="tag">Status</span>
                @if($quiz->trashed())
                    <span class="tag is-danger">Gelöscht</span>
                @else
                    @if(!$quiz->questions->isEmpty())
                        <span class="tag is-success">Veröffentlicht</span>
                    @else
                        <span class="tag is-warning">Unvollständig</span>
                    @endif
                @endif
            </div>
        </div>
        <div class="level-right">
            <p class="m-r-sm has-text-weight-bold"><i
                    class="far fa-user"></i> {{ number_format($quiz->play_count, 0 , ',' , '.' ) }}
            </p>
            <p class="has-text-weight-bold"><i class="far fa-heart"></i> ? %</p>
        </div>
    </div>
    <hr class="m-t-none">

    <div class="level">
        <div class="level-left"><p class="has-text-weight-light">{{ Str::limit($quiz->description, 50) }}</p></div>
        <div class="level-right">
            @if(!$quiz->trashed())
                @can('update', $quiz)
                    <a href="{{route('quiz.edit', $quiz)}}" class="button is-warning m-r-sm">
                        <i class="fas fa-pen m-r-sm"></i> Bearbeiten</a>
                @endcan
                @can('delete', $quiz)
                    <form action="{{ route('quiz.destroy', $quiz) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="button has-text-danger is-text">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                @endcan
            @else
                @can('restore', $quiz)
                    <form action="{{route('quiz.restore', $quiz->id)}}" method="post">
                        @csrf
                        @method('put')
                        <button class="button is-success m-r-sm">
                            <i class="fas fa-undo m-r-sm"></i> Wiederherstellen
                        </button>
                    </form>
                @endcan
                @can('forceDelete', $quiz)
                    <form action="{{ route('quiz.force-delete', $quiz->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="button has-text-danger is-text">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                @endcan
            @endif
        </div>
    </div>
</div>