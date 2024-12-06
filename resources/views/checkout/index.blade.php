@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">Checkout</h1>
    <p class="text-neutral-800">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi odit non vel?</p>

    <x-card class="my-8">
        @if ($order->count() > 0)
            <div class="">
                <h2 class="text-xl font-semibold">List obat :</h2>
                @foreach ($order->cart->items as $item)
                    <div class="my-3 bg-green-100/60 max-w-md p-4 rounded-md shadow-sm">
                        <p>Nama obat : {{ $item->obat->nama }}</p>
                        <p>Qty : {{ $item->quantity }}</p>
                        <p>Harga satuan : Rp. {{ number_format($item->obat->harga, 2) }}</p>
                    </div>
                @endforeach
                <b>Total Harga : Rp. {{ number_format($order->amount, 2) }}</b>
            </div>
            <div class="mt-6">
                <x-secondary-button>Bayar sekarang</x-secondary-button>
            </div>
        @else
            <p>You don't have latest checkout order for now</p>
        @endif
    </x-card>
@endsection