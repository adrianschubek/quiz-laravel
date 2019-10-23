<?php

namespace App\Http\Controllers\Likes;

use App\Comment;
use App\Like;
use App\Quiz;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;

class LikeCommentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function __invoke(Quiz $quiz, Comment $comment)
    {
        $this->authorize('like', $comment);

        $like = new Like();
        $like->user()->associate(auth()->user());

        $comment->likes()->save($like);

        return redirect(URL::previous() . "#" . $comment->id)
            ->with('ok', 'Du magst diesen Kommentar.');
    }
}
