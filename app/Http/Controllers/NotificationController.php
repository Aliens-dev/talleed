<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{

    public function markAsRead()
    {
        $user = auth()->user();
        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
        return back();
    }
}
