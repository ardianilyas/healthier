<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use App\Models\Plan;
use App\Models\User;
use Midtrans\Config;
use App\Models\Membership;
use App\Models\Transaction;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService) {

        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        $this->paymentService = $paymentService;
    }

    public function purchaseMembership(Plan $plan)
    {
        $user = Auth::user();

        $membership = $this->paymentService->createMembership($plan);

        $transaction = $this->paymentService->createTransaction('membership', $membership, $plan->price);

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

        $this->paymentService->compareSignatureKey($notification);

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

            if($transaction->transactionable_type == 'App\Models\Membership') {
                $membership = $this->paymentService->createMembership($transaction);
                $this->paymentService->updateUserStatus($membership);
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
