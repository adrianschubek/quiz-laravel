<?php

namespace App\Http\Controllers;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {

    }


}
