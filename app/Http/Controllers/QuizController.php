<?php

namespace App\Http\Controllers;

use App\Quiz;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuizController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
        $this->authorizeResource(Quiz::class, 'quiz');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = auth()->user();
        return view('quiz.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "title" => "required|string|min:10|max:40",
            "description" => "required|string|min:10|max:400",
        ]);
        $data["user_id"] = auth()->user()->id;

        $quiz = Quiz::create($data);
        return redirect(route('quiz.edit', $quiz));
    }

    /**
     * Display the specified resource.
     *
     * @param Quiz $quiz
     * @return Response
     */
    public function show(Quiz $quiz)
    {
        return [$quiz, $quiz->questions];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Quiz $quiz
     * @return Response
     */
    public function edit(Quiz $quiz)
    {
        return view('quiz.edit', compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Quiz $quiz
     * @return Response
     */
    public function update(Request $request, Quiz $quiz)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Quiz $quiz
     * @return Response
     * @throws \Exception
     */
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
