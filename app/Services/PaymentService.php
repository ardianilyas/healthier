<?php

namespace App\Services;

use App\Models\User;
use App\Models\Membership;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class PaymentService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function createMembership($plan) {
        $user = Auth::user();

        $membership = Membership::create([
            'user_id' => $user->id,
            'plan_id' => $plan->id,
        ]);

        return $membership;
    }

    public function createTransaction($type, $membership, $amount) {
        $user = Auth::user();

        $orderId = '';

        if($type == 'membership') {
            $orderId = "Membership-" . uniqid();
        } else {
            $orderId = "Order-" . uniqid();
        }
        
        $transaction = $membership->transactions()->create([
            'user_id' => $user->id,
            'order_id' => $orderId,
            'amount' => $amount,
        ]);

        return $transaction;
    }

    public function compareSignatureKey($notification) {
        $serverKey = config('midtrans.server_key');
        $signatureKey = hash('sha512', $notification->order_id . $notification->status_code . $notification->gross_amount . $serverKey);

        if($signatureKey !== $notification->signature_key) {
            return response()->json(['message' => 'Invalid signature key'], 403);
        }
    }

    public function updateMembership($transaction) {
        $membership = Membership::where('id', $transaction->transactionable_id)->first();
        $membership->start_date = now();
        $membership->end_date = now()->addMonth();
        $membership->status = 'active';
        $membership->save();
    }

    public function updateUserStatus($membership) {
        $user = User::where('id', $membership->user_id)->first();
        $user->is_membership = true;
        $user->save();
    }
}
