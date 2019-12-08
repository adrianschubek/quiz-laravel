<div class="box m-b-md">
    {{--    wire:init="nextQuestion"--}}
    @if($this->position + 1 === $this->max)
        <div wire:loading style="width: 100%">
            <article class="message is-link">
                <div class="message-body">
                    <i class="fas fa-circle-notch fa-spin m-r-sm"></i> Deine Antworten werden überprüft...
                </div>
            </article>
        </div>
    @else
        <div wire:loading style="width: 100%">
            <article class="message is-info">
                <div class="message-body">
                    <i class="fas fa-circle-notch fa-spin m-r-sm"></i> Frage wird geladen...
                </div>
            </article>
        </div>
    @endif
    <div wire:loading.class="is-hidden">
        @if($this->position === $this->max)
            <p class="subtitle">Auswertung</p>
            <p>
                Du hast <span>{{ $this->results['correct'] }}</span> von
                <span class="has-text-weight-bold">{{ $this->max }}</span>
                Fragen richtig beantwortet.
            </p>
            {{ ddd($this->position, $this->max, $this->results) }}
            {{--            {{ ddd($this->results['answers']['user'], $this->results['answers']['correct']) }}--}}
            {{--            {{ ddd($this->results['answers']['correct']) }}--}}
        @else
            {{--            {{ info([$this->position, $this->max, $this->results]) }}--}}
            {{--            {{ ddd($this->position, $this->max, $this->results) }}--}}

            <p class="has-text-weight-light">Frage {{ $this->position + 1 }} von {{ $this->max }}</p>
            <p class="subtitle">{{ $this->question['title'] }}</p>

            <form wire:submit.prevent="addAnswer(Object.fromEntries(new FormData($event.target)))">
                <div class="inputGroup">
                    <input id="radio1" name="answer" type="radio" value="0">
                    <label for="radio1">{{ $this->question['answer_1'] }}</label>
                </div>
                @if(isset($this->question['answer_2']))
                    <hr style="margin: 0 !important;">
                    <div class="inputGroup">
                        <input id="radio2" name="answer" type="radio" value="1">
                        <label for="radio2">{{ $this->question['answer_2'] }}</label>
                    </div>
                    @if(isset($this->question['answer_3']))
                        <hr style="margin: 0 !important;">
                        <div class="inputGroup">
                            <input id="radio3" name="answer" type="radio" value="2">
                            <label for="radio3">{{ $this->question['answer_3'] }}</label>
                        </div>
                        @if(isset($this->question['answer_4']))
                            <hr style="margin: 0 !important;">
                            <div class="inputGroup">
                                <input id="radio4" name="answer" type="radio" value="3">
                                <label for="radio4">{{ $this->question['answer_4'] }}</label>
                            </div>
                        @endif
                    @endif
                @endif
                <button class="button is-fullwidth is-light">Weiter</button>
            </form>
        @endif
    </div>
</div>

@push('scripts')
    <script>
        // Alle        Checkboxen        unchecken
        document.addEventListener("livewire:load", function () {
            window.livewire.afterDomUpdate(() => {
                let radios = document.getElementsByTagName('input');
                for (let i = 0; i < radios.length; i++) {
                    radios[i].checked = false;
                }
            });
        });
    </script>
@endpush
