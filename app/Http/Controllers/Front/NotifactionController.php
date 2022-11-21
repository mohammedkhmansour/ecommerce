<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifactionController extends Controller
{
    // public function index()
    // {
    //     $user = Auth::user();
    //     foreach($user->notifications as $notification){
    //         echo $notification->unread();
    //     }

    //     return view('layouts.main-header',compact('user'));
    // }

    /**
     * هان خلاص عملناها مباشرة في مكان الاشعارات وعملت 2 ميثود مع 2 راوت
     * واحدة لقراءة الكل وهي يلي استخدمتها والثانية لقراءة وحدة
     * بس لسة م استخدمتها
     */
        public function notifactionred()
    {
        $user = Auth::user();
        foreach($user->notifications as $notification){
             $notification->markAsRead();
        }
    }


    public function MarkAsRead_all (Request $request)
    {

        $userUnreadNotification= auth()->user()->unreadNotifications;

        if($userUnreadNotification) {
            $userUnreadNotification->markAsRead();
            return back();
        }


    }
}
