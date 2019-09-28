<?php

namespace App\Http\Livewire;

use App\Quiz;
use Livewire\Component;

class Search extends Component
{
    public $query;
    public $type;

    public function mount($query)
    {
        $this->query = $query;
        $this->type = 'title';
    }

    public function updatingType($value)
    {
        $this->validate(["type" => "in:titlex,description"]);
    }

    public function render()
    {
        return view('livewire.search', [
            "quizzes" => Quiz::with('user')->where($this->type, 'like', '%' . $this->query . '%')->limit(50)->get()
        ]);
    }
}
