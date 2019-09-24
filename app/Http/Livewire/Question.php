<?php

namespace App\Http\Livewire;

use App\Quiz;
use Livewire\Component;

class Question extends Component
{
    public $title;

    protected $questions;

    public function mount($quiz)
    {
        $this->questions = $quiz->questions;
    }

    public function render()
    {
        return view('livewire.question', [
            "questions" => $this->questions
        ]);
    }

    public function store()
    {

    }
}
