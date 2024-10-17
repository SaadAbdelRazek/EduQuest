<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use Illuminate\Support\Facades\Mail;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        set_time_limit(120);
        // Validate email
        $request->validate([
            'email' => 'required|email|unique:subscriptions,email',
        ]);

        // Save email to database
        $subscription = new Subscription();
        $subscription->email = $request->email;
        $subscription->save();

        // Send confirmation email
        $this->sendSubscriptionConfirmation($subscription->email);

        return back()->with('success', 'Thank you for subscribing! A confirmation email has been sent.');
    }

    private function sendSubscriptionConfirmation($email)
    {
        $details = [
            'title' => 'You are now subscribed',
            'body' => 'Thank you for subscribing to our newsletter! You will receive regular updates from us.',
            'logo_url' => asset('img/hero/logo.png') // Add your logo path here
        ];

        Mail::send('website.emails.subscription_confirmation', $details, function($message) use ($email) {
            $message->to($email)
                ->subject('Subscription Confirmation');
        });
    }
}

