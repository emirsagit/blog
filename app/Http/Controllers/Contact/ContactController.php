<?php

namespace App\Http\Controllers\Contact;


use App\Models\Role;
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
        $roleSuperAdmin = Role::where('name', 'superAdmin')->first();
        $users = User::where('role_id',$roleSuperAdmin->id)->get();
        Notification::send($users ,new ContactNotification($request));
        return redirect()->back()->with([
            'status' => 'Mesajınız iletildi'
        ]);
    } 
}
