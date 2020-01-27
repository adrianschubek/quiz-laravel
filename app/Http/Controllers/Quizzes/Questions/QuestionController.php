<?php

namespace App\Http\Controllers\Quizzes\Questions;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestionRequest;
use App\Question;
use App\Quiz;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except('show');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreQuestionRequest $request
     * @param Quiz $quiz
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function store(StoreQuestionRequest $request, Quiz $quiz)
    {
        $this->authorize('create', $quiz);
        $data = $request->validated();

        // Falls als richtig markierte Antwort leer ist.
        if (!isset($data['answer_' . $data['correct']])) {
            return back()->withInput()->with('correct', 'Als richtig markierte Antwort ist leer');
        }

        $question = new Question($request->validated());
        $question->quiz()->associate($quiz);
        $question->save();

        return redirect()->route('quiz.edit', $quiz);
    }

    public function update(StoreQuestionRequest $request, Quiz $quiz)
    {
        // TODO:
        ddd($request);
        return back()->with('ok', 'Frage aktualisiert');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Quiz $quiz
     * @param Question $question
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Quiz $quiz, Question $question)
    {
        $question->delete();
        return back()->with('ok', 'Frage gelöscht');
    }
}
