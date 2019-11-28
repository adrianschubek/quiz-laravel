<?php

namespace App\Http\Controllers;

use App\Quiz;

class HomeController extends Controller
{
    public function __invoke()
    {
        $builder = Quiz::with('user')->public();

        switch (request('sort')) {
            case 'plays':
                $builder->mostPlayed();
            case 'likes':
                $builder->mostLiked();
            default:
                $builder->latest();
        }

        return view('home', ['quizzes' => $builder->paginate()]);
    }
}
