<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use Livewire\Component;

class NotificationComponent extends Component
{

    public function markAsRead($notificationId)
    {
        $notification = auth()->user()->notifications()->find($notificationId);
        $notification->markAsRead();
        return redirect()->to($notification->data['route']);
    }

    public function render()
    {
        return view('admin.livewire.notification-component', [
            'notifications' => auth()->user()
                ->notifications()->orderBy('created_at','DESC')->take(5)->get(),
            'unread' => auth()->user()->unreadnotifications()->count(),
        ]);
    }
}
