<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function deleteNotification(Notification $notification)
    {
        $notification->delete();
        return redirect()->back();
    }
}
