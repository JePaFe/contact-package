<?php

namespace JePaFe\Contact\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use JePaFe\Contact\Http\Requests\ContactRequest;
use JePaFe\Contact\Mail\ContactMailable;
use JePaFe\Contact\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact::contact');
    }

    public function store(ContactRequest $request)
    {
        Mail::to(config('contact.send_email_to'))
            ->send(new ContactMailable($request->get('name'), $request->get('message')));

        Contact::create($request->all());

        return redirect(route('contact'));
    }
}
