<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $message = Contact::latest()->get();
        return view('dashboard.contact.contact',compact('message'));
    }

    public function homeContact()
    {
        return view('dashboard.contact.home-contact');
    }

    public function store(Request $request)
    {
         Contact::create($request->all());
         return redirect()->route('home');

    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('dashboard.contact.show',compact('contact'));
    }
    public function destroy($id)
    {
        $contacts = Contact::findOrFail($id)->delete();
        flash()->addError('تم الحذف بنجاح');

        return redirect()->route('contact.index');
    }
}
