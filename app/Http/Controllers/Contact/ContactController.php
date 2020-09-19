<?php

namespace App\Http\Controllers\Contact;


use App\Models\User;
use App\Mail\ContactEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;
use App\Notifications\ContactNotification;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');  
    } 

    public function store(ContactRequest $request)
    {
        // Mail::to(env('MAIL_CONTACT_TO'))->send(new ContactEmail($request));
        $user = User::where('email', env('MAIL_CONTACT_TO'))->firstOrFail();
        Notification::send($user ,new ContactNotification($request));
        return redirect()->back()->with([
            'message' => 'Mesajınız iletildi'
        ]);
    } 
}
