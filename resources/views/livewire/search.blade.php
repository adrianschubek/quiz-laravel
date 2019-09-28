<div class="container m-t-md">
    <div class="field has-addons">
        <div class="control is-large has-icons-left is-expanded" wire:target="input" wire:dirty.class="is-loading">
            <input class="input is-large @if($quizzes->isEmpty()) is-danger @endif" type="text" placeholder="Suche..." autofocus wire:model="query"
                   wire:ref="input">
            <span class="icon is-small is-left">
                <i class="fas fa-search"></i>
            </span>
            <progress class="progress is-small is-dark m-t-sm" max="100" wire:dirty wire:target="input"></progress>
            <span>{{ $quizzes->count() }} Quizze gefunden.</span>
        </div>
        <div class="select is-large">
            <select wire:change="$set('type', $event.target.value)">
                <option value="title">in Titel</option>
                <option value="description">in Beschreibung</option>
            </select>
        </div>
    </div>
    <div class="container m-t-md m-b-md">
        <div class="columns is-mobile is-multiline is-centered">
            @forelse($quizzes as $quiz)
                <div class="column is-narrow">
                    @include('layouts.quiz', $quiz)
                </div>
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
