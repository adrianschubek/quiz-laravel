<?php

namespace App\Http\Controllers\Comments;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Like;
use App\Quiz;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except(['show']);
        $this->authorizeResource(Comment::class, 'comment', ['except' => ['show']]);
    }

    public function index()
    {
        $comments = auth()->user()->comments()->withCount('likes')->paginate(15);
        return view('comments.index', compact('comments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCommentRequest $request
     * @param Quiz $quiz
     * @return RedirectResponse
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
     * @return Factory|View
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

    public function like(Quiz $quiz, Comment $comment)
    {
        $this->authorize('like', $comment);

        $like = new Like();
        $like->user()->associate(auth()->user());

        $comment->likes()->save($like);

        return redirect()
            ->to(url()->previous() . "#" . $comment->id)
            ->with('ok', 'Du magst diesen Kommentar.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Quiz $quiz
     * @param Comment $comment
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Quiz $quiz, Comment $comment)
    {
        $comment->delete();
        return back()->with('ok', 'Kommentar gelöscht');
    }
}
