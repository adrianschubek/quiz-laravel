<div>
    @forelse($questions as $question)
x
    @empty
        <article class="message is-danger">
            <div class="message-body">
                Noch keine Fragen vorhanden
            </div>
        </article>
    @endforelse

    <div class="box">

        {{ $title }}

        <div class="field">
            <label class="label">Frage</label>
            <div class="control">
                <input class="input @error('title') is-danger @enderror" type="text"
                       placeholder="Gebe eine Frage ein" name="title" wire:model="title">
            </div>
            @error('title')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
        <hr>
        <div class="field">
            <label class="label">Antwort</label>
            <div class="control">
                <textarea class="textarea @error('description') is-danger @enderror" type="text"
                          placeholder="Gebe eine Beschreibung ein" name="description"></textarea>
            </div>
            @error('description')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
