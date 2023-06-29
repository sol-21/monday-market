<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        Subscriber::create([
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'You have been subscribed successfully!');
    }

    public function unsubscribe($email)
    {
        Subscriber::where('email', $email)->delete();

        return redirect()->back()->with('success', 'You have been unsubscribed successfully!');
    }
}
