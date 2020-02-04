<?php

namespace App\Http\Controllers\Notifications;

use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $notifications = auth()->user()->notifications()->latest()->paginate();

        return view('notifications.notifications', compact('notifications'));
    }
}
