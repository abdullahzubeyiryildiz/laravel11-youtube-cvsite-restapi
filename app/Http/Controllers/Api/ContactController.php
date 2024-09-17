<?php

namespace App\Http\Controllers\Api;

use App\Models\Contact;
use App\Mail\ContactMail;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::paginate(20);
        return response()->json(['message' => 'Gelen Kutusu', 'data'=>$contacts], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable',
            'subject' => 'nullable',
            'body' => 'nullable',
        ]);
        $validatedData['ip']=request()->ip();
        $contact = Contact::create($validatedData);
        return response()->json(['message' => 'Başarıyla Mesaj Gönderildi.','data'=> $contact], 200);
    }

    public function mailSend(Request $request)
    {
        $subject = $request->input('subject');
        $message = $request->input('message');
        $email = $request->input('email');

        $contact = Contact::where('email',$email)->first();

        if(empty($contact)) {
            return response()->json(['message' => 'E-Posta Bulunamadı!'], 401);
        }

        $contact->message = $message;

        Mail::to($contact->email)->send(new ContactMail($subject, $contact));

        return response()->json(['message' => 'Mail Gönderildi'], 200);
    }

    public function subscribeForm(Request $request) {
        $request->validate([
            'email' => 'required|email|unique:subscriptions,email',
        ]);

        Subscription::create([
            'email' => $request->email,
        ]);

        return response()->json(['error'=> false, 'message'=>'Abone Olundu']);

    }
}
