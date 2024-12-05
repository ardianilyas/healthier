<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Obat;
use App\Models\Order;
use App\Models\CartItem;
use App\Services\CartService;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    protected $cartService;
    public function __construct(CartService $cartService) {
        $this->cartService = $cartService;
    }

    public function index() {
        $cart = Cart::activeCart()->with('items.obat')->first();

        $totalHarga = $this->cartService->getTotalHarga($cart);  

        return view('keranjang.index', compact('cart', 'totalHarga'));
    }

    public function add(Obat $obat) {
        $this->cartService->updateCart($obat);

        return redirect()->route('keranjang.index');
    }

    public function checkout(Cart $cart) {
        $cartItem = $cart->items;

        $currentCheckoutCart = Cart::checkoutCart()->first();

        if($currentCheckoutCart) {
            return back()->with(['error' => 'Please pay latest checkout first']);
        }

        $amount = $this->cartService->getTotalHarga($cart);

        $order = Order::create([
            'user_id' => Auth::id(),
            'cart_id' => $cart->id,
            'amount' => $amount
        ]);

        $cart->status = 'checkout';
        $cart->save();

        return redirect()->route('checkout.index');
    }

    public function removeItem(CartItem $cartItem) {
        $cartItem->delete();        
        return back();
    }
}
