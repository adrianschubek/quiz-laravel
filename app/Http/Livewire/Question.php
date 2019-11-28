<?php

namespace App\Http\Livewire;

use App\Quiz;
use Illuminate\Support\Collection;
use Livewire\Component;

class Question extends Component
{
    public int $position;
    public array $answers;
    public int $max;
    public array $results;
    protected Collection $questions;
    protected \App\Question $currentQuestion;

    public function mount(Quiz $quiz)
    {
        $this->answers = [];
        $this->results = [];
        $this->position = 0;
        $this->questions = $quiz->questions()->orderBy('order', 'asc')->get();
        $this->currentQuestion = $this->questions[$this->position];
        $this->max = count($this->questions);
    }

    public function addAnswer($data)
    {
        if (!isset($data["answer"])) {
            return;
        }
        $this->answers[$this->position] = (int)$data["answer"];
        $this->nextQuestion();
    }

    public function nextQuestion()
    {
        if ($this->position + 1 === $this->max) {
            $this->position++;
            $this->checkResults();
            return;
        }
        $this->currentQuestion = $this->questions[++$this->position];
    }

    public function checkResults()
    {
        $correctAnswers = $this->questions->pluck('correct');
        $userAnswers = collect($this->answers);
        $wrongAnswers = $correctAnswers->diffAssoc($userAnswers);

        $this->results['correct'] = $this->max - $wrongAnswers->count();
        $this->results['answers'] = [
            "user" => $userAnswers,
            "correct" => $wrongAnswers
        ];

        $this->questions[0]->quiz()->increment('play_count');
    }

    public function render()
    {
        return view('livewire.question', [
            'question' => $this->currentQuestion ?? null
        ]);
    }
}
