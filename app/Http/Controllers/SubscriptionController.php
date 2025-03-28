<?php

// app/Http/Controllers/SubscriptionController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscriptions,email'
        ]);

        Subscription::create([
            'email' => $request->email
        ]);

        return back()->with('success', 'Subscribed successfully!');
    }
}
