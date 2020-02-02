<?php

namespace App\Notifications;

use App\Quiz;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;

class QuizLiked extends Notification implements ShouldQueue
{
    use Queueable;

    private Quiz $quiz;
    private User $user;

    public function __construct(Quiz $quiz, User $user)
    {
        $this->quiz = $quiz;
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

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            "desc" => sprintf('%s gefällt dein Quiz "%s"', $this->user->name, Str::limit($this->quiz->title, 10)),
            "link" => route("quiz.likedby", [$this->quiz, Str::slug($this->quiz->title)]),
            "quiz_id" => $this->quiz->id,
            "user_id" => $this->user->id,
        ];
    }
}
