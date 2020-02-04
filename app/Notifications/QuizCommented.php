<?php

namespace App\Notifications;

use App\Quiz;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Auth\Authenticatable as User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;

class QuizCommented extends Notification implements ShouldQueue
{
    use Queueable;

    private Quiz $quiz;
    private User $user;

    public function __construct(Quiz $quiz, User $user)
    {
        $this->quiz = $quiz;
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            "desc" => sprintf("'%s' hat dein Quiz kommentiert", $this->user->name),
            "link" => route("comments.show", [$this->quiz, Str::slug($this->quiz->title)]),
            "quiz_id" => $this->quiz->id,
            "user_id" => $this->user->id,
        ];
    }
}
