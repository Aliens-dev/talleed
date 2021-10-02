<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function index() {
        $latest = Post::latests(4)->get();
        $topRead = Post::topRead(5)->get();
        return view("index", compact(["latest","topRead"]));
    }

    public function confidentiality()
    {
        return view('pages.confidentiality');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function contactPost(Request $request)
    {
        $rules = [
            'subject' => 'required|min:3|max:25',
            'email' => 'required|email',
            'type' => 'required',
            'message' => 'required|max:500|min:10'
        ];

        $this->validate($request, $rules);

        $contact = new Contact();
        $contact->subject = $request->subject;
        $contact->email = $request->email;
        $contact->type = $request->type;
        $contact->message = $request->message;
        $contact->save();

        return back()->with('success', 'تم استلام رسالتك, سيتم الرد عليك في اقرب وقت');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function notFound()
    {
        return view('pages.404');
    }
}
