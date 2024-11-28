<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {
        $id = Auth::user()->id;

        $cart = session()->get('cart_' . $id, []);

        $totalPrice = 0;

        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['qty'];
        }

        return view('keranjang.index', compact('cart', 'totalPrice'));
    }

    public function add(Obat $obat) {
        $id = Auth::user()->id;

        $cart = session()->get('cart_' . $id);

        if (!$cart) {
            $cart = [
                $obat->id => [
                    'nama' => $obat->nama,
                    'qty' => 1,
                    'price' => $obat->harga,
                ]
            ];
        } else {
            if (isset($cart[$obat->id])) {
                $cart[$obat->id]['qty']++;
            } else {
                $cart[$obat->id] = [
                    'nama' => $obat->nama,
                    'qty' => 1,
                    'price' => $obat->harga,
                ];
            }
        }

        session()->put('cart_' . $id, $cart);
        return redirect()->route('keranjang.index');
    }
}
