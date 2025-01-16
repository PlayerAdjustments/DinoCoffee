<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller
{
    /**
     * Soft delete the notification if it belongs to the authenticated user.
     */
    public function destroy(Notification $notification)
    {
        //? If notification exists and belongs to user.
        if($notification && $notification->user_matricula == Auth::user()->matricula)
        {
            $notification->delete();

            return back()->with('Info','Notification deleted successfully.');
        }

        //? If not, return with error.
        return redirect()->route('dashboard.main')->withErrors('You do not have permission to delete this notification.');
    }
}
