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
        $user = auth()->user();
        $notifications = $user->notifications()->paginate(10);
        return view('admin.notification.index', compact('user', 'notifications'));
    }

    public function show(Request $request)
    {
        $user = auth()->user();
        $notification = $user->notifications()
            ->where('id', $request->notification) 
            ->first();
            if(!$notification->read_at) {
                $notification->markAsRead();
            }
        return view('admin.notification.show', compact('notification'));
    }

    public function destroy(Request $request)
    {
        $user = auth()->user();
        $user->notifications()
            ->where('id', $request->notification) 
            ->first()
            ->delete();
        return redirect()->back()->with([
            'status' => 'Bildirim başarılyla silindi'
        ]);
    }
}
