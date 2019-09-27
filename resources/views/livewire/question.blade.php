<div>
    @forelse($questions as $question)
        @include('layouts.question-edit', $question)
    @empty
        <article class="message is-danger">
            <div class="message-body">
                Keine Fragen vorhanden.
            </div>
        </article>
    @endforelse
    <div class="is-divider"></div>
    <div class="box m-b-md has-background-white-bis">
        <div class="field">
            <label class="label">Frage</label>
            <div class="control has-icons-left" wire:dirty.class="is-loading" wire:target="title-input">
                <input class="input @error('title') is-danger @enderror"
                       type="text"
                       placeholder="Gebe eine Frage ein"
                       name="title"
                       wire:ref="title-input"
                       wire:model.lazy="title"
                >
                <span class="icon is-left">
                    <i class="fa fa-question"></i>
                </span>
            </div>
            @error('title')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
        <hr>
        <div class="field">
            <label class="label">1. Antwort</label>
            <div class="control" wire:dirty.class="is-loading" wire:target="answer1">
                <input class="input @error('answer1') is-danger @enderror" type="text"
                       placeholder="Gebe eine Antwort ein"
                       name="answer1"
                       wire:ref="answer1"
                       wire:model.lazy="answer1"
                >
            </div>
            @error('answer1')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="field">
            <label class="label">2. Antwort</label>
            <div class="control" wire:dirty.class="is-loading" wire:target="answer2">
                <input class="input @error('answer2') is-danger @enderror" type="text"
                       placeholder="Gebe eine Antwort ein (optional)"
                       name="answer2"
                       wire:ref="answer2"
                       wire:model.lazy="answer2"
                >
            </div>
            @error('answer2')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="field">
            <label class="label">3. Antwort</label>
            <div class="control" wire:dirty.class="is-loading" wire:target="answer3">
                <input class="input @error('answer3') is-danger @enderror" type="text"
                       placeholder="Gebe eine Antwort ein (optional)"
                       name="answer3"
                       wire:ref="answer3"
                       wire:model.lazy="answer3">
            </div>
            @error('answer3')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="field">
            <label class="label">4. Antwort</label>
            <div class="control" wire:dirty.class="is-loading" wire:target="answer4">
                <input class="input @error('answer4') is-danger @enderror" type="text"
                       placeholder="Gebe eine Antwort ein (optional)"
                       name="answer4"
                       wire:ref="answer4"
                       wire:model.lazy="answer4">
            </div>
            @error('answer4')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label for="correct-select">
                        Richtige Antwort
                    </label>

                    <div class="control has-icons-left">
                        <div class="select">
                            <select id="correct-select" wire:model="correct" @empty($answer1) disabled @endif>
                                @empty($answer1)
                                    <option disabled>Keine Antworten</option>
                                @else
                                    <option value="1">1) {{ $answer1 }}</option>
                                    @if(!empty($answer2))
                                        <option value="2">2) {{ $answer2 }}</option>
                                    @endif
                                    @if(!empty($answer3))
                                        <option value="3">3) {{ $answer3 }}</option>
                                    @endif
                                    @if(!empty($answer4))
                                        <option value="4">4) {{ $answer4 }}</option>
                                    @endif
                                @endif
                            </select>
                        </div>
                        <div class="icon is-left">
                            <i class="fas fa-check-square"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <div class="control">
                        <label for="order">Position</label>
                        <input class="input @error('order') is-danger @enderror" type="number" id="tentacles" name="tentacles"
                               min="0" max="100" id="order"
                               wire:model.lazy="order"
                        >
                        @error('order')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column"></div>
            <div class="column is-narrow">
                <button wire:click="store" class="button is-success" wire:loading.attr="disabled"><i class="fas fa-paper-plane m-r-sm"></i> Frage hinzufügen</button>
            </div>
        </div>
    </div>
</div>
