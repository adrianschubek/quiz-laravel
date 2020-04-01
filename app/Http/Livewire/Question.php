<?php
/**
 * Copyright (c) 2020. Adrian Schubek
 * https://adriansoftware.de
 */

namespace App\Http\Livewire;

use App\Quiz;
use Livewire\Component;

class Question extends Component
{
    public $position;
    public $answers;
    public $max;
    public $results;
    public $quizId;

    public function mount(Quiz $quiz)
    {
        $this->answers = [];
        $this->results = [];
        $this->position = 0;
        $this->quizId = $quiz->id;
        $this->max = $quiz->questions()->count();
    }

    public function getQuestionProperty()
    {
        return Quiz::find($this->quizId)
            ->questions()
            ->orderBy('order', 'asc')
            ->get()[$this->position];
    }

    public function addAnswer($answer)
    {
        if (!isset($answer)) {
            return;
        }
        $this->answers[$this->position] = (int)$answer;
        $this->nextQuestion();
    }

    public function nextQuestion()
    {
        if ($this->position + 1 === $this->max) {
            $this->position++;
            $this->checkResults();
            return;
        }
        $this->position++;
    }

    public function checkResults()
    {
        $quiz = Quiz::find($this->quizId);

        $questions = $quiz->questions()->orderBy('order', 'asc')->get();
        $correctAnswers = $questions->pluck('correct');
        $userAnswers = collect($this->answers);
        $wrongAnswers = $correctAnswers->diffAssoc($userAnswers);

        $this->results['correct'] = $this->max - $wrongAnswers->count();
        $this->results['user'] = $userAnswers;
        $this->results['questions'] = $questions;

        $quiz->increment('play_count');
    }


    public function render()
    {
        return view('livewire.question');
    }
}
