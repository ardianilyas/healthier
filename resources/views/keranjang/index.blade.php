@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">Keranjang</h1>

    <x-card class="my-8">
        @if ($cart->items->count() > 0)
            @foreach ($cart->items as $item)
                <div class="mb-5 max-w-md bg-gray-100/80 p-4 flex justify-between items-center rounded-md shadow-sm item" id="item-{{ $item->id }}">
                    <div>
                        <p>Nama obat : {{ $item->obat->nama }}</p>
                        <p>Jumlah : {{ $item->quantity }}</p>
                        <p>Total harga : Rp. {{ number_format($item->obat->harga * $item->quantity, 2) }}</p>
                    </div>
                    <form action="{{ route('keranjang.removeItem', $item->id) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="px-5 py-2 text-xs text-white font-semibold bg-red-500 hover:bg-red-600 rounded-md shadow-md">Hapus item</button>
                    </form>
                </div>
            @endforeach

            <div class="mt-6">
                <b>Total harga : Rp. <span id="total-harga">{{ number_format($totalHarga, 2) }}</span></b>
            </div>

            <form action="{{ route('keranjang.checkout') }}" method="POST" class="mt-4">
                @csrf
                <x-secondary-button type="submit">Checkout</x-secondary-button>
            </form>
        @else
            <p>Your cart is empty</p>
        @endif
    </x-card>
@endsection