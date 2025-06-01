<?php

namespace App\Http\Controllers\Action;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function read(Request $request)
    {
        $loginUserId = Auth::id();
        
        // Count unread notifications before updating
        $notifyCount = Notification::where('user_id', $loginUserId)
                                ->where('status', 'unread')
                                ->count();

        // Update all notifications to read
        Notification::where('user_id', $loginUserId)->update(['status' => 'read']);

        // Return the count if needed (optional)
        return $notifyCount;
    }
}