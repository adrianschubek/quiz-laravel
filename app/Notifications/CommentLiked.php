<?php

namespace App\Notifications;

use App\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Auth\Authenticatable as User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;

class CommentLiked extends Notification implements ShouldQueue
{
    use Queueable;

    private Comment $comment;
    private User $user;

    public function __construct(Comment $comment, User $user)
    {
        $this->comment = $comment;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            "desc" => sprintf("'%s' gefällt dein Kommentar '%s'", $this->user->name, Str::limit($this->comment->comment, 10)),
            "link" => route("comments.show", [$this->comment->quiz, Str::slug($this->comment->quiz->title)]),
            "comment_id" => $this->comment->id,
            "user_id" => $this->user->id,
        ];
    }
}
