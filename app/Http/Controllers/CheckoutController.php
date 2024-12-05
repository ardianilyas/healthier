<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;

// use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index() {
        $order = Order::order()->with('cart.items.obat')->first();
        // $items = CartItem::where('cart_id', $order->cart_id)->get();

        return view('checkout.index', compact('order'));
    }
}
