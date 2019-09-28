<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Question extends Component
{
    public $title;
    public $answer1;
    public $answer2;
    public $answer3;
    public $answer4;
    public $correct = 1;
    public $order = 1;

    protected $quiz;
    protected $rules = [
        "title" => "required|min:10|max:80",
        "answer1" => "required|max:80",
        "answer2" => "required_with:answer3,answer4|max:80",
        "answer3" => "required_with:answer4|max:80",
        "answer4" => "max:80",
        "correct" => "integer|between:1,4",
        "order" => "integer|between:0,100"
    ];

    public function mount($quiz)
    {
        $this->quiz = $quiz;
    }

    public function updatedTitle($value)
    {
        $this->validate(["title" => $this->rules["title"]]);
    }

    public function updatedAnswer1($value)
    {
        $this->validate(["answer1" => $this->rules["answer1"]]);
    }

    public function updatedAnswer2($value)
    {
        $this->validate(["answer2" => $this->rules["answer2"]]);
    }

    public function updatedAnswer3($value)
    {
        $this->validate(["answer3" => $this->rules["answer3"]]);
    }

    public function updatedAnswer4($value)
    {
        $this->validate(["answer4" => $this->rules["answer4"]]);
    }

    public function updatedCorrect($value)
    {
        $this->validate(["correct" => $this->rules["correct"]]);
    }

    public function updatedOrder($value)
    {
        $this->validate(["order" => $this->rules["order"]]);
    }

    public function store()
    {
        $this->validate($this->rules);

        $question = new \App\Question(
            [
                "title" => $this->title,
                "order" => $this->order,
                "answer_1" => $this->answer1,
                "answer_2" => $this->answer2,
                "answer_3" => $this->answer3,
                "answer_4" => $this->answer4,
                "correct" => $this->correct
            ]
        );

        $this->quiz->questions()->save($question);
        return redirect()->route('quiz.edit', $this->quiz);
    }

    public function render()
    {
        return view('livewire.question', [
            "questions" => $this->quiz->questions
        ]);
    }
}
