<?php

namespace JePaFe\Contact\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        $client = new Client();

        $options = [
            'form_params' => [
                'secret' => config('contact.api_secret_key'),
                'response' => $request->get('recaptcha-response'),
                'remoteip' => $request->ip()
            ]
        ];

        $result = json_decode($client->post(config('contact.url_recaptcha'), $options)->getBody());

        if ($result->success && $result->action == 'contact' && $result->score > 0.5) {
            Mail::to(config('contact.send_email_to'))
                ->send(new ContactMailable($request->get('name'), $request->get('email'), $request->get('message')));

            Contact::create($request->all());
        }

        return redirect(route('contact'));
    }
}
