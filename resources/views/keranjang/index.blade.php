@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">Keranjang</h1>

    <div class="my-8">
        @if ($cart != null)
            @foreach ($cart as $item)
            <div class="my-2">
                <p>Item : {{ $item['nama'] }}</p>
                <p>Qty : {{ $item['qty'] }}</p>
                <p>Price : Rp. {{ number_format($item['qty'] * $item['price'], 2) }}</p>
            </div>
            @endforeach
            
            <b>Total harga : Rp. {{ number_format($totalPrice, 2) }}</b>

            <div class="mt-6">
                <x-primary-link href="">Pesan sekarang</x-primary-link>
            </div>
        @else
            <p>Your cart is empty</p>
        @endif
    </div>
@endsection