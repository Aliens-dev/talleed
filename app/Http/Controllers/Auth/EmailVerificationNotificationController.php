<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $rules = [
            'email' => 'required|email|exists:users',
        ];
        $request->validate($rules);
        $user = User::where('email',$request->email)->first();
        if ($user->hasVerifiedEmail()) {
            return redirect()->route("users.profile", ['user' => auth()->id()]);
        }
        // update to new template !
        $user->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
