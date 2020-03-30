<?php
/**
 * Copyright (c) 2020. Adrian Schubek
 * https://adriansoftware.de
 */

namespace App\Http\Controllers;

use App\Quiz;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $builder = Quiz::with('user')->public();

        switch ($request->sort) {
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
