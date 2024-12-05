<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Obat;
use App\Services\CartService;

class CartController extends Controller
{
    protected $cartService;
    public function __construct(CartService $cartService) {
        $this->cartService = $cartService;
    }

    public function index() {
        $cart = Cart::cart()->with('items.obat')->first();

        $totalHarga = $this->cartService->getTotalHarga($cart);  

        return view('keranjang.index', compact('cart', 'totalHarga'));
    }

    public function add(Obat $obat) {
        $this->cartService->updateCart($obat);

        return redirect()->route('keranjang.index');
    }

    public function checkout() {
        
    }

    public function removeItem(CartItem $cartItem) {
        $cartItem->delete();        
        return back();
    }
}
