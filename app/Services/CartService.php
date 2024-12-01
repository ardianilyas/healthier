<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function updateCart($obat) {
        $id = Auth::id();
        
        $cart = Cart::firstOrCreate([
            'user_id' => $id,
            'status' => 'active',
        ]);

        $cartItem = CartItem::where('cart_id', $cart->id)->where('obat_id', $obat->id)->first();

        if($cartItem) {
            $cartItem->quantity++;
            $cartItem->save();
        } else {
            $newCartItem = CartItem::create([
                'cart_id' => $cart->id,
                'obat_id' => $obat->id,
            ]);
        }
    }
}
