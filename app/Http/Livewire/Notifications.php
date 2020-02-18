<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Notifications extends Component
{
    public $notifications = [];

    public function getNotifications()
    {
        if (!auth()->user()) return;
        $this->notifications = auth()->user()->unreadNotifications;
    }

    public function readNotification($id)
    {
        $notif = auth()->user()->notifications()->findOrFail($id);
        $notif->markAsRead();

        if ($notif->data["link"]) {
            return redirect($notif->data["link"]);
        }
    }

    public function markAllAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        $this->notifications = [];
    }

    public function render()
    {
        return view('livewire.notifications');
    }
}
