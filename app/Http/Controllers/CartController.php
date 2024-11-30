<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {
        $cart = Cart::where('user_id', Auth::id())->with('items.obat')->first();

        // $cartItems = CartItem::where('cart_id', $cart->id)->sum('quantity');

        $totalHarga = 0;

        foreach ($cart->items as $item) {
            $totalHarga += $item->obat->harga * $item->quantity;
        }

        return view('keranjang.index', compact('cart', 'totalHarga'));
    }

    public function add(Obat $obat) {
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

        return redirect()->route('keranjang.index');
    }

    public function removeItem(CartItem $cartItem) {
        $cartItem->delete();        
        return back();
    }
}
