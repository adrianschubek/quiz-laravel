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
                break;
            case 'likes':
                $builder->mostLiked();
                break;
            default:
                $builder->latest();
        }

        return view('home', ['quizzes' => $builder->paginate()]);
    }
}
