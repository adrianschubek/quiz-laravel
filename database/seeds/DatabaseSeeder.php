<?php

use App\Question;
use App\Quiz;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(CategorySeeder::class);
        factory(User::class, 500)->create();
        factory(Quiz::class, 1000)->create();
        factory(Question::class, 1700)->create();
    }
}
