<?php
/**
 * Copyright (c) 2020. Adrian Schubek
 * https://adriansoftware.de
 */

namespace App\Http\Livewire;

use App\Quiz;
use App\User;
use Livewire\Component;

class Search extends Component
{
    public $query;
    public $type;
    protected $updatesQueryString = ["query", "type"];

    public function mount()
    {
        $this->query = request("query");
        $this->type = request("type") ?? "title";
    }

    public function updatingType($value)
    {
        $this->validate(["type" => "in:title,description,user"]);
    }

    public function render()
    {
        return view('livewire.search', [
            "quizzes" =>
                $this->type === 'user' ?
                    $this->getQuizzesForUser()
                    :
                    $this->getQuizzes()
        ]);
    }

    private function getQuizzesForUser()
    {
        $collection = User::where('name', 'like', '%' . $this->query . '%')->limit(10)->get();
        $quizzes = collect();
        foreach ($collection as $user) {
            $quizzes = $quizzes->merge($user->quizzes()->whereHas('questions')->withCount('likes')->limit(5)->get());
        }
        return $quizzes;
    }

    private function getQuizzes()
    {
        return Quiz::withCount('likes')
            ->with('user')
            ->where($this->type, 'like', '%' . $this->query . '%')
            ->whereHas('questions')
            ->limit(50)
            ->get();
    }
}
