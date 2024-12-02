<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Obat;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    protected $cartService;
    public function __construct(CartService $cartService) {
        $this->cartService = $cartService;
    }

    public function index() {
        $cart = Cart::where('user_id', Auth::id())->with('items.obat')->first();

        $totalHarga = 0;

        if($cart) {
            foreach ($cart->items as $item) {
                $totalHarga += $item->obat->harga * $item->quantity;
            }
        }

        return view('keranjang.index', compact('cart', 'totalHarga'));
    }

    public function add(Obat $obat) {
        $this->cartService->updateCart($obat);

        return redirect()->route('keranjang.index');
    }

    public function removeItem(CartItem $cartItem) {
        $cartItem->delete();        
        return back();
    }
}
