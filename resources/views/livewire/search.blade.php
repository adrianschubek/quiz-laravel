<div class="container m-t-md">
    <div class="field has-addons">
        <div class="control is-large has-icons-left is-expanded" wire:target="query" wire:dirty.class="is-loading">
            <input class="input is-large @if($quizzes->isEmpty()) is-danger @endif" type="text" placeholder="Suche..."
                   autofocus wire:model="query">
            <span class="icon is-small is-left">
                <i class="fas fa-search"></i>
            </span>
            <div class="tags has-addons m-t-sm">
                <span class="tag is-medium_ is-dark">{{ $quizzes->count() ?: "Keine" }} Quizze</span>
                <span class="tag is-medium_ is-white">in {{ number_format(microtime(true) - LARAVEL_START, 3, ',', '.') }} Sekunden gefunden</span>
            </div>
        </div>
        <div class="select is-large">
            <select wire:change="$set('type', $event.target.value)">
                <option value="title" @if(request("type") === "title") selected @endif>in Titel</option>
                <option value="description" @if(request("type") === "description") selected @endif>in Beschreibung
                </option>
                <option value="user" @if(request("type") === "user") selected @endif>von</option>
            </select>
        </div>
    </div>
    <div class="container m-t-md m-b-md">
        <div class="columns is-mobile is-multiline is-centered">
            @forelse($quizzes as $quiz)
                <div class="column is-narrow">
                    @include('layouts.quiz.quiz', $quiz)
                </div>
                @if($loop->last && $loop->count === 50)
                    <article class="message">
                        <div class="message-body">
                            Es werden maximal 50 Treffer angezeigt.
                        </div>
                    </article>
                @endif
            @empty
        </div>
        <article class="message is-danger">
            <div class="message-body">
                Keine Quizze gefunden.
            </div>
        </article>
        @endforelse
    </div>
</div>
</div>
