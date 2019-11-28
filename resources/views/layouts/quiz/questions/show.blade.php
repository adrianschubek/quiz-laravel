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
        <div class="column is-narrow">
            <form action="{{ route('questions.destroy', [$quiz, $question]) }}"
                  method="post"
                  onsubmit="button.disabled = true;button.classList.add('is-loading')">
                @csrf
                @method('delete')
                <span class="has-text-weight-light">Position: {{ $question->order }}</span>
                <button name="button" class="button tag is-delete is-light"></button>
            </form>
        </div>
    </div>
</div>

