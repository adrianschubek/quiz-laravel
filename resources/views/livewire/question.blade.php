<div class="box m-b-md">
    @if($this->position + 1 === $this->max)
        <div wire:loading style="width: 100%">
            <div class="notification has-text-centered" style="align-content: center">
                <i class="fas fa-circle-notch fa-spin fa-3x m-r-sm"></i>
                <p>Deine Antworten werden überprüft...</p>
            </div>
        </div>
    @else
        <div class="ph-item noborder" wire:loading style="width: 100%; padding: 2em 0 0;">
            <div class="ph-col-12">
                <div class="ph-row">
                    <div class="ph-col-4"></div>
                    <div class="ph-col-8 empty"></div>

                    <div class="ph-col-12"></div>
                    <div class="ph-col-2 empty"></div>
                </div>
                <div class="ph-row">
                    <div class="ph-col-8 big"></div>
                    <div class="ph-col-2 empty big"></div>
                    <div class="ph-col-2 big"></div>
                </div>
                <div class="ph-row">
                    <div class="ph-col-8 big"></div>
                    <div class="ph-col-2 empty big"></div>
                    <div class="ph-col-2 big"></div>
                </div>
                <div class="ph-row">
                    <div class="ph-col-8 big"></div>
                    <div class="ph-col-2 empty big"></div>
                    <div class="ph-col-2 big"></div>
                </div>
                <div class="ph-row">
                    <div class="ph-col-8 big"></div>
                    <div class="ph-col-2 empty big"></div>
                    <div class="ph-col-2 big"></div>
                </div>
            </div>
        </div>
    @endif
    <div wire:loading.class="is-hidden">
        @if($this->position === $this->max)
            <p class="subtitle">Ergebnis</p>
            <p>
                Du hast <span>{{ $this->results['correct'] }}</span> von
                <span class="has-text-weight-bold">{{ $this->max }}</span>
                Fragen richtig beantwortet.
            </p>
            {{--            {{ ddd($this->position, $this->max, $this->results) }}--}}

            <div class="m-t-sm" x-data="{erg: false}">
                <template x-if="!erg">
                    <button class="button is-light is-fullwidth" @click="erg = !erg">Lösung anzeigen
                    </button>
                </template>
                <template x-if="erg">

                    @foreach($this->results["questions"] as $q)
                        <div class="box">
                            <b>{{$q->title}}</b><br>
                            <span class="tag is-success is-light">Richtige Antwort</span>
                            {{ $q["answer_" . ($q->correct + 1)] }}
                            <hr>
                            <span class="tag is-info is-light">Deine Antwort</span>
                            {{ $q["answer_" . ($this->results["user"][$loop->index] + 1)] }}
                        </div>
                    @endforeach

                </template>
            </div>

        @else
            <p class="has-text-weight-light">Frage {{ $this->position + 1 }} von {{ $this->max }}</p>
            <p class="subtitle">{{ $this->question['title'] }}</p>

            <div class="control">
                <a class="box noboxshadow has-background-white-ter shrink-sm quizbtn m-b-sm" wire:click="addAnswer(0)">
                    {{ $this->question['answer_1'] }}
                </a>
                @if(isset($this->question['answer_2']))
                    <a class="box noboxshadow has-background-white-ter shrink-sm quizbtn m-b-sm"
                       wire:click="addAnswer(1)">
                        {{ $this->question['answer_2'] }}
                    </a>
                    @if(isset($this->question['answer_3']))
                        <a class="box noboxshadow has-background-white-ter shrink-sm quizbtn m-b-sm"
                           wire:click="addAnswer(2)">
                            {{ $this->question['answer_3'] }}
                        </a>
                        @if(isset($this->question['answer_4']))
                            <a class="box noboxshadow has-background-white-ter shrink-sm quizbtn m-b-sm"
                               wire:click="addAnswer(3)">
                                {{ $this->question['answer_4'] }}
                            </a>
                        @endif
                    @endif
                @endif
            </div>

            {{--            <form wire:submit.prevent="addAnswer(Object.fromEntries(new FormData($event.target)))">--}}
            {{--                <div class="inputGroup">--}}
            {{--                    <input id="radio1" name="answer" type="radio" value="0">--}}
            {{--                    <label for="radio1">{{ $this->question['answer_1'] }}</label>--}}
            {{--                </div>--}}
            {{--                @if(isset($this->question['answer_2']))--}}
            {{--                    <hr style="margin: 0 !important;">--}}
            {{--                    <div class="inputGroup">--}}
            {{--                        <input id="radio2" name="answer" type="radio" value="1">--}}
            {{--                        <label for="radio2">{{ $this->question['answer_2'] }}</label>--}}
            {{--                    </div>--}}
            {{--                    @if(isset($this->question['answer_3']))--}}
            {{--                        <hr style="margin: 0 !important;">--}}
            {{--                        <div class="inputGroup">--}}
            {{--                            <input id="radio3" name="answer" type="radio" value="2">--}}
            {{--                            <label for="radio3">{{ $this->question['answer_3'] }}</label>--}}
            {{--                        </div>--}}
            {{--                        @if(isset($this->question['answer_4']))--}}
            {{--                            <hr style="margin: 0 !important;">--}}
            {{--                            <div class="inputGroup">--}}
            {{--                                <input id="radio4" name="answer" type="radio" value="3">--}}
            {{--                                <label for="radio4">{{ $this->question['answer_4'] }}</label>--}}
            {{--                            </div>--}}
            {{--                        @endif--}}
            {{--                    @endif--}}
            {{--                @endif--}}
            {{--                <button class="button is-fullwidth is-light">Weiter</button>--}}
            {{--            </form>--}}


        @endif
    </div>
</div>

{{--@push('scripts')
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
@endpush--}}
