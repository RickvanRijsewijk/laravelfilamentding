<?php

// app/Http/Controllers/SubscriptionController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionEmail;

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

        return back()->with('success', 'Successvol ingeschreven!');
    }

    public function unsubscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $subscription = Subscription::where('email', $request->email)->first();

        if ($subscription) {
            $subscription->delete();
            return view('unsubscribe-success'); 
        } else {
            return back()->with('error', 'Email not found.');
        }
    }
}
