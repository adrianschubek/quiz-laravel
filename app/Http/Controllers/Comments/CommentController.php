<?php

namespace App\Http\Controllers\Comments;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Like;
use App\Quiz;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\URL;

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
     * @param StoreCommentRequest $request
     * @param Quiz $quiz
     * @return void
     */
    public function store(StoreCommentRequest $request, Quiz $quiz)
    {
        $data = $request->validated();

        $comment = new Comment($data);
        $comment->user()->associate(auth()->user());

        $quiz->comments()->save($comment);
        return back()->with('ok', 'Kommentar erstellt');
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
            ->withCount('likes')
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

    public function like(Quiz $quiz, Comment $comment)
    {
        $this->authorize('like', $comment);

        $like = new Like();
        $like->user()->associate(auth()->user());

        $comment->likes()->save($like);

        return redirect(URL::previous() . "#" . $comment->id)->with('ok', 'Du magst diesen Kommentar.');
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
