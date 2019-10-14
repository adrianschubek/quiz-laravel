<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Quiz;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except(['show']);
        $this->authorizeResource(Comment::class, 'quiz');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
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
            "comment" => "min:3|max:300|required"
        ]);
        dd($data);
    }

    /**
     * Display the specified resource.
     *
     * @param Quiz $quiz
     * @return Response
     */
    public function show(Quiz $quiz)
    {
        $comments = $quiz->comments()
            ->with('user')
            ->latest()
            ->paginate(15);

        return view('comments.show', compact('quiz', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Comment $comment
     * @return Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Comment $comment
     * @return Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Comment $comment
     * @return Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
