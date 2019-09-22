<div>
    <div class="box">
        <div class="field">
            <label class="label">Frage</label>
            <div class="control">
                <input class="input @error('title') is-danger @enderror" type="text"
                       placeholder="Gebe ein Titel ein" name="title">
            </div>
            @error('title')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="field">
            <label class="label">Beschreibung</label>
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
