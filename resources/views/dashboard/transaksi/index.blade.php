@extends('layouts.dashboard')

@section('content')
    <x-h1>Riwayat Transaksi</x-h1>
    <x-p>Daftar riwayat transaksi Anda di website Healthier.</x-p>

    <div class="my-10 grid grid-cols-2 gap-8">
        @forelse ($transactions as $transaction)
            <x-card>
                <p class="text-lg font-semibold">Kode Transaksi : {{ $transaction->order_id }}</p>
                <p class="text-lg font-semibold">Status : {{ $transaction->status }}</p>
                <p class="mt-2 text-sm">Total : Rp. {{ number_format($transaction->amount, 0, ',', '.') }}</p>
                <p class="mt-2 text-sm">Jenis Pembayaran : {{ $transaction->payment_type }}</p>
                <p class="mt-2 text-sm">Tanggal : {{ $transaction->created_at->format('d F Y') }}</p>
            </x-card>
        @empty
            <x-card>
                Transaksi masih kosong.
            </x-card>
        @endforelse
    </div>
@endsection