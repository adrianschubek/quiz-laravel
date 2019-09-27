<div class="container m-t-md">
    <div class="field">
        <div class="control is-large" wire:target="input" wire:dirty.class="is-loading">
            <input class="input is-large" type="text" placeholder="Suche..." wire:model="query" wire:ref="input">
        </div>
    </div>
    <div class="container m-t-md m-b-md">
        <div class="columns is-mobile is-multiline is-centered">
            @forelse($quizzes as $quiz)
                <div class="column is-narrow">
                    @include('layouts.quiz', $quiz)
                </div>
            @empty
                <div class="column">Keine Quizze gefunden.</div>
            @endforelse
        </div>
        <button wire:click="gotoPage(2)">2</button>
        @if(!empty($quizzes))
            {{ $quizzes->links() }}
        @endif
    </div>
</div>
