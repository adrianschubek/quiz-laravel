<?php

namespace App\Http\Controllers\Quizzes;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuizRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Quiz;

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
        $quiz = new Quiz($request->validated());
        $quiz->user()->associate(auth()->user());
        $quiz->save();

        return redirect()->route('quiz.edit', $quiz);
    }

    public function show(Quiz $quiz)
    {
        if (!isset($quiz->user)) return abort(404);
        return view('quiz.show', compact('quiz'));
    }

    public function edit(Quiz $quiz)
    {
        return view('quiz.edit', compact('quiz'));
    }

    public function update(StoreQuizRequest $request, Quiz $quiz)
    {
        //..
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('quiz.index');
    }

    public function forceDelete($id)
    {
        $quiz = Quiz::withTrashed()->findOrFail($id);
        $this->authorize('forceDelete', $quiz);

        $quiz->forceDelete();
        return redirect()->route('quiz.index');
    }

    public function restore($id)
    {
        $quiz = Quiz::withTrashed()->findOrFail($id);
        $this->authorize('restore', $quiz);

        $quiz->restore();
        return redirect()->route('quiz.index');
    }
}
