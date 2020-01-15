<div class="box">
    <div class="columns">
        <div class="column">
            <h2 class="subtitle"><span
                    class="subtitle has-text-grey-light">{{ $loop->iteration }}. Frage</span> {{ $question->title }}
            </h2>
            <ul>
                <li>
                    <span class="has-text-weight-light">1)</span> {{ $question->answer_1 }}
                    @if($question->correct === 1)
                        <span class="tag is-success is-light">Richtige Antwort</span>
                    @endif
                </li>
                @isset($question->answer_2)
                    <hr class="m-t-sm m-b-sm">
                    <li>
                        <span class="has-text-weight-light">2)</span> {{ $question->answer_2 }}
                        @if($question->correct === 2)
                            <span class="tag is-success is-light">Richtige Antwort</span>
                        @endif
                    </li>
                @endisset
                @isset($question->answer_3)
                    <hr class="m-t-sm m-b-sm">
                    <li>
                        <span class="has-text-weight-light">3)</span> {{ $question->answer_3 }}
                        @if($question->correct === 3)
                            <span class="tag is-success is-light">Richtige Antwort</span>
                        @endif
                    </li>
                @endisset
                @isset($question->answer_4)
                    <hr class="m-t-sm m-b-sm">
                    <li>
                        <span class="has-text-weight-light">4)</span> {{ $question->answer_4 }}
                        @if($question->correct === 4)
                            <span class="tag is-success is-light">Richtige Antwort</span>
                        @endif
                    </li>
                @endisset
            </ul>
        </div>
        <div class="column is-narrow" x-data="{ open: false }">
            {{--            <form action="{{ route('questions.destroy', [$quiz, $question]) }}"--}}
            {{--                  method="post"--}}
            {{--                  onsubmit="button.disabled = true;button.classList.add('is-loading')">--}}
            {{--                @csrf--}}
            {{--                @method('delete')--}}
            {{--                <span class="has-text-weight-light">Position: {{ $question->order }}</span>--}}
            {{--                <button name="button" class="button tag is-delete is-light"></button>--}}
            {{--            </form>--}}
            <button class="button is-warning" @click="open = true"><i class="fas fa-pen m-r-sm"></i>Bearbeiten</button>
            <div class="modal" x-bind:class="{ 'is-active': open }">
                <div class="modal-background" @click="open = false"></div>
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title">Modal title</p>
                    </header>
                    <section class="modal-card-body">
                        {{ $question->title  }}
                        <input type="X">
                    </section>
                    <footer class="modal-card-foot">
                        <button class="button is-info"><i class="fas fa-save m-r-sm"
                                                          @click="fetch('https://google.de')"></i>Speichern
                        </button>
                        <button class="button is-light" @click="open = false">Abbrechen</button>
                    </footer>
                </div>
                <button class="modal-close is-large" aria-label="close" @click="open = false"></button>
            </div>
        </div>
    </div>
</div>

