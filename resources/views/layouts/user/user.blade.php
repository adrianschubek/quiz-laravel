<a href="{{ route('profiles.show', $user) }}" class="box">
    <article class="media">
        <figure class="media-left">
            <p class="image is-64x64">
                <canvas width="64" height="64" data-jdenticon-value="{{ $user->name }}"></canvas>
            </p>
        </figure>
        <div class="media-content">
            <div class="content">
                <p>
                    <span class="subtitle">{{ $user->name }}</span>
                    <small class="has-text-weight-light">#{{ $user->id }}</small>
                    @if($user->isAdmin())
                        <span class="tag is-danger is-light">Administrator</span>
                    @endif
                    <br>
                    @if($quiz_count > 0)
                        <span class="tag is-light">
                            <i class="fas fa-layer-group m-r-sm"></i> {{ $quiz_count }}
                        </span>
                    @endif
                    @if($likes > 0)
                        <span class="tag is-light is-danger">
                            <i class="fas fa-heart m-r-sm"></i> {{ $likes }}
                        </span>
                    @endif
                </p>
            </div>
        </div>
    </article>
</a>
