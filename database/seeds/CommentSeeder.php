<?php

use App\User;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Comment::class, 100)->make()->each(function (App\Comment $comment) {
            $user = User::inRandomOrder()->first();
            $quiz = $user->quizzes()->inRandomOrder()->first();
            $comment->user_id = $user->id;
            if (!$quiz) return true;
            $quiz->comments()->save($comment);
        });


//        factory(App\Comment::class, 100)->make(['user_id' => 123, 'quiz_id' => 1000])->each->save()

    }
}
