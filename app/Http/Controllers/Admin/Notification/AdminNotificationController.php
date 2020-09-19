<?php

namespace App\Http\Controllers\Admin\Notification;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;

class AdminNotificationController extends Controller
{
    //unread notifications'a globalde erişilecek. Authantication tanımlandığında construct metodunda. 
    //yoksa navigation kısımında doğru sonucu göstermiyor
    public function index()
    {
        $user = User::where('email', env('MAIL_CONTACT_TO'))->with('notifications')->firstOrFail();
        $unreadNotifications = $user->unreadNotifications;
        $user->notifications->markasRead();
        $notifications = $user->notifications()->paginate(10);
        return view('admin.notification.index', compact('user', 'notifications', 'unreadNotifications'));
    }

    public function show(Request $request)
    {
        //unread notifications'a globalde erişilecek. Authantication tanımlandığında...

        $user = User::where('id', $request->user)->with('notifications')->firstOrFail();
        $notification = $user->notifications()
            ->where('id', $request->notification) // and/or ->where('type', $notificationType)
            ->first();
        return view('admin.notification.show', compact('notification'));
    }

    public function destroy(Request $request)
    {
        $user = User::where('id', $request->user)->with('notifications')->firstOrFail();
        $user->notifications()
            ->where('id', $request->notification) // and/or ->where('type', $notificationType)
            ->first()
            ->delete();
        return redirect()->back()->with([
            'message' => 'Bildirim başarılyla silindi'
        ]);
    }
}
