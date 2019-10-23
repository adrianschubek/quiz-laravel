<?php

namespace App\Http\Controllers\Quizzes;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuizRequest;
use App\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except('show');
        $this->authorizeResource(Quiz::class, 'quiz');
    }

    public function index()
    {
        $user = auth()->user();
        return view('quiz.index', compact('user'));
    }

    public function create()
    {
        return view('quiz.create');
    }

    public function store(StoreQuizRequest $request)
    {
        $data = $request->validated();

        $quiz = new Quiz($data);
        $quiz->user()->associate(auth()->user());
        $quiz->save();

        return redirect(route('quiz.edit', $quiz));
    }

    public function show(Quiz $quiz)
    {
        return view('quiz.show', compact('quiz'));
    }

    public function edit(Quiz $quiz)
    {
        return view('quiz.edit', compact('quiz'));
    }

    public function update(Request $request, Quiz $quiz)
    {

    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect(route('quiz.index'));
    }

    public function forceDelete($id)
    {
        $quiz = Quiz::withTrashed()->findOrFail($id);
        $this->authorize('forceDelete', $quiz);

        $quiz->forceDelete();
        return redirect(route('quiz.index'));
    }

    public function restore($id)
    {
        $quiz = Quiz::withTrashed()->findOrFail($id);
        $this->authorize('restore', $quiz);

        $quiz->restore();
        return redirect(route('quiz.index'));
    }
}
