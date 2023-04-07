<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function confirm($token)
    {
        $subscriber = Subscriber::where('confirmation_token', $token)->first();

        if (!$subscriber) {
            abort(404);
        }

        $subscriber->update([
            'is_confirmed' => true,
            'confirmation_token' => null,
        ]);

        return view('subscriptions.confirmed');
    }
}
