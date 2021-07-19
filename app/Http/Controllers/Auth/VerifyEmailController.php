<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param Request $request
     * @param $id
     * @param $hash
     * @return RedirectResponse
     */
    public function __invoke(Request $request, $id, $hash)
    {
        $rules = [
            'id' => "required",
            'hash' => "required",
        ];
        $user = User::findOrFail($id);

        if ($user->hasVerifiedEmail()) {
            return redirect()->route("users.profile", ['user' => auth()->id(), 'verified',1]);
        }

        if (! hash_equals((string) $id, (string) $user->getKey()) or ! hash_equals((string) $hash, sha1($user->getEmailForVerification())))
        {
            return back()->withErrors(['Please verify the lastest sent email, or reset one!']);
        }

        if (! $user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
            event(new Verified($user));
        }

        return redirect()->route("login")->with('profile_activated','تم تفعيل الحساب بنجاح');
    }
}
