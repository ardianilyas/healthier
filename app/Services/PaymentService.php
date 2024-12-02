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

    public function createTransaction($type, $reference) {
        $user = Auth::user();

        $orderId = '';

        if($type == 'membership') {
            $orderId = "Membership-" . uniqid();
        } else {
            $orderId = "Order-" . uniqid();
        }
        
        $transaction = Transaction::create([
            'order_id' => $orderId,
            'user_id' => $user->id,
            'type' => $type,
            'reference_id' => $reference->id,
        ]);

        return $transaction;
    }
}
