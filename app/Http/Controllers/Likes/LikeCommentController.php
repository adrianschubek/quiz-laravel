<?php

namespace App\Http\Controllers\Likes;

use App\Comment;
use App\Like;
use App\Notifications\CommentLiked;
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

        $comment->user->notify(new CommentLiked($comment, auth()->user()));

        return redirect(URL::previous() . "#" . $comment->id)
            ->with('ok', 'Du magst diesen Kommentar.');
    }
}
