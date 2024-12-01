<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use App\Models\Plan;
use App\Models\User;
use Midtrans\Config;
use App\Models\Membership;
use Midtrans\Notification;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    public function __construct() {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    public function purchaseMembership(Plan $plan)
    {
        $user = Auth::user();

        $membership = Membership::create([
            'user_id' => $user->id,
            'plan_id' => $plan->id,
        ]);

        $transaction = Transaction::create([
            'order_id' => "Membership-" . uniqid(), // Generate unique order ID
            'user_id' => $user->id,
            'type' => 'membership',
            'reference_id' => $membership->id,
        ]);

        $snapToken = $this->createSnapTransaction($transaction, $plan->price, $user);

        return response()->json([
            'snap_token' => $snapToken,
        ]);
    }

    private function createSnapTransaction($transaction, $amount, $user)
    {
        $transactionDetails = [
            'order_id' => $transaction->order_id,
            'gross_amount' => $amount,
        ];

        $customerDetails = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->mail,
        ];

        $snapPayload = [
            'transaction_details' => $transactionDetails,
            'customer_details' => $customerDetails,
        ];

        $snapToken = Snap::getSnapToken($snapPayload);

        return $snapToken;
    }

    public function handleCallback(Request $request)
    {
        $payload = $request->getContent();
        $notification = json_decode($payload);

        // Validate the notification
        $orderId = $notification->order_id;
        $transactionStatus = $notification->transaction_status;

        $transaction = Transaction::where('order_id', $orderId)->first();

        if (!$transaction) {
            Log::error('Invalid notification received', ['payload' => $payload]);
            return response()->json(['status' => 'error'], 400);
        }

        if ($transactionStatus == 'settlement') {

            // Handle successful payment
            $transaction->status = "success";
            $transaction->payment_type = $notification->payment_type;

            if($transaction->type == 'membership') {
                $membership = Membership::where('id', $transaction->reference_id)->first();
                $membership->start_date = now();
                $membership->end_date = now()->addMonth();
                $membership->status = 'active';
                $membership->save();

                $user = User::where('id', $membership->user_id)->first();
                $user->is_membership = true;
                $user->save();
            }
        } elseif($transactionStatus == 'pending') {
            $transaction->status = 'pending';
        } elseif($transactionStatus == 'deny' || $transactionStatus == 'cancel' || $transactionStatus == 'expire') {
            $transaction->status = 'failed';
        }

        $transaction->save();

        return response()->json(['status' => 'ok']);
    }
}