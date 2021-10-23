<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        return view('admin.contact.index');
    }

    public function show(Request $request, $contactId)
    {
        $contact = Contact::findOrFail($contactId)->first();
        return view('admin.contact.show',compact('contact'));
    }

    public function destroy(Request $request, $contactId)
    {
        $contact = Contact::findOrFail($contactId)->first();

        $contact->delete();
        return redirect()->route('admin.contact.index')->with('success','تم حذف الرسالة');
    }
}
