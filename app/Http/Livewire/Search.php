<?php

namespace App\Http\Livewire;

use App\Quiz;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;

    public $query;
    protected $quizzes = [];

    public function mount($query)
    {
        $this->query = $query;
        $this->quizzes = Quiz::where('title', 'like', '%' . $this->query . '%')->paginate();
    }

    public function updatedQuery()
    {
        $this->quizzes = Quiz::where('title', 'like', '%' . $this->query . '%')->paginate();
    }

    public function render()
    {
//        dd($this->quizzes);
        return view('livewire.search', [
            "quizzes" => $this->quizzes
        ]);
    }
}
