<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Notifications\UserRegistered;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param Request $request
     * @return RedirectResponse
     *
     */
    public function store(Request $request)
    {

        $rules=  [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'username' => 'required|unique:users',
            'speciality' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'about_me' => 'required|string|max:255|min:20',
            'user_image' => 'required|image|mimes:jpg,png',
            'field_id' => 'required|exists:categories,id',
            'social_media_account' => 'required|string|url',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];

        $request->validate($rules);


        $role = Role::where('name','author')->first();

        if($request->hasFile('user_image')) {
            $image_url = $request->file('user_image')->store('users/profiles');
        }

        $user = User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'username' => $request->username,
            'speciality' => $request->speciality,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'about_me' => $request->about_me,
            'user_image' => $image_url,
            'social_media_account' => $request->social_media_account,
            'field_id' => $request->field_id,
            'role_id' => $role->id,
        ]);
        //event(new Registered($user));
        event(new \App\Events\UserRegistered($user));
        $admins = User::where('role_id', Role::where('name', 'admin')->first()->id)->get();
        Notification::send($admins, new UserRegistered($user));
        //Auth::login($user);
        return back()->with(['success' => 'تم التسجيل بنجاح افقد ايميلك لتفعيل الحساب']);
    }
}
