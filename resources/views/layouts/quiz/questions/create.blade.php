<div x-data="{ show: false }">
    <button class="button is-info m-b-sm is-fullwidth" @click="show = !show">Neue Frage erstellen</button>
    <form x-show="show" action="{{ route('questions.store', $quiz) }}" method="post"
          onsubmit="button.disabled = true;button.classList.add('is-loading')">
        @csrf
        <div class="box m-b-md has-background-white-bis">
            <div class="field">
                <label class="label">Frage</label>
                <div class="control has-icons-left">
                    <input class="input @error('title') is-danger @enderror"
                           type="text"
                           placeholder="Gebe eine Frage ein"
                           name="title"
                           value="{{ old('title') }}"
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
                <div class="columns is-vcentered">
                    <div class="column">
                        <div class="control">
                            <input class="input @error('answer_1') is-danger @enderror" type="text"
                                   placeholder="Gebe eine Antwort ein"
                                   name="answer_1"
                                   value="{{ old('answer_1') }}"
                            >
                        </div>
                        @error('answer_1')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="column is-narrow">
                        <input id="switchColorInfo1" type="checkbox" name="correct" value="1"
                               class="switch is-info is-rounded" checked>
                        <label for="switchColorInfo1">Richtig?</label>
                    </div>
                </div>
            </div>
            <div class="field">
                <label class="label">2. Antwort</label>
                <div class="columns is-vcentered">
                    <div class="column">
                        <div class="control">
                            <input class="input @error('answer_2') is-danger @enderror" type="text"
                                   placeholder="Gebe eine Antwort ein (optional)"
                                   name="answer_2"
                                   value="{{ old('answer_2') }}"
                            >
                        </div>
                        @error('answer_2')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="column is-narrow">
                        <input id="switchColorInfo2" type="checkbox" name="correct" value="2"
                               class="switch is-info is-rounded">
                        <label for="switchColorInfo2">Richtig?</label>
                    </div>
                </div>
            </div>
            <div class="field">
                <label class="label">3. Antwort</label>
                <div class="columns is-vcentered">
                    <div class="column">
                        <div class="control">
                            <input class="input @error('answer_3') is-danger @enderror" type="text"
                                   placeholder="Gebe eine Antwort ein (optional)"
                                   name="answer_3"
                                   value="{{ old('answer_3') }}"
                            >
                        </div>
                        @error('answer_3')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="column is-narrow">
                        <input id="switchColorInfo3" type="checkbox" name="correct" value="3"
                               class="switch is-info is-rounded">
                        <label for="switchColorInfo3">Richtig?</label>
                    </div>
                </div>
            </div>
            <div class="field">
                <label class="label">4. Antwort</label>
                <div class="columns is-vcentered">
                    <div class="column">
                        <div class="control">
                            <input class="input @error('answer_4') is-danger @enderror" type="text"
                                   placeholder="Gebe eine Antwort ein (optional)"
                                   name="answer_4"
                                   value="{{ old('answer_4') }}"
                            >
                        </div>
                        @error('answer_4')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="column is-narrow">
                        <input id="switchColorInfo4" type="checkbox" name="correct" value="4"
                               class="switch is-info is-rounded">
                        <label for="switchColorInfo4">Richtig?</label>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <label for="order">Reihenfolge</label>
                    <input class="input @error('order') is-danger @enderror" type="number"
                           id="order"
                           name="order"
                           min="0" max="1000"
                           value="{{ old('order') ?? 1 }}"
                    >
                    @error('order')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    @if(session('correct'))
                        <article class="message is-danger">
                            <div class="message-body">
                                <i class="fa fa-exclamation-triangle m-r-sm"></i> {{ session('correct') }}
                            </div>
                        </article>
                    @endif
                </div>
                <div class="column is-narrow">
                    <button class="button is-info" type="submit" name="button">
                        <i class="fas fa-paper-plane m-r-sm"></i> Frage hinzufügen
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

@push('scripts')
    <script>
        document.querySelectorAll('input[type=checkbox]').forEach(($elem) => {
            $elem.addEventListener('change', function () {
                document.querySelectorAll('input[type=checkbox]').forEach(($all) => $all.checked = false);
                this.checked = true;
            })
        })
    </script>
@endpush
