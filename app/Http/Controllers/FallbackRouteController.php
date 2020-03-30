<?php
/**
 * Copyright (c) 2020. Adrian Schubek
 * https://adriansoftware.de
 */

namespace App\Http\Controllers;

class FallbackRouteController extends Controller
{
    public function __invoke()
    {
        return view("errors.404");
    }
}
