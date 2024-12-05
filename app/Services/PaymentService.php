<?php

namespace App\Services;

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
}
