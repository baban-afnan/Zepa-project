<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivationController extends Controller
{
    // Show activation form
    public function show()
    {
        // Notifications example (empty array for now)
        $notifyCount = 0;
        $notifications = [];

        return view('activations', compact('notifyCount', 'notifications'));
    }

    // Handle form submit
    public function activate(Request $request)
    {
        // Validate input
        $request->validate([
            'activation_code' => 'required|string|max:255',
        ]);

        // Example activation logic
        if ($request->activation_code === 'SECRET123') {
            return redirect()->back()->with('success', 'Account activated successfully!');
        } else {
            return redirect()->back()->with('error', 'Invalid activation code.');
        }
    }
}
