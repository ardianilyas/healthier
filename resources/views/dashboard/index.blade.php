@extends('layouts.dashboard')

@section('heading')
    <x-h1>Dashboard page</x-h1>
    <x-p>Dashboard Healthier.</x-p>

    <div class="mt-8 grid grid-cols-2 lg:grid-cols-3 gap-8">
        <x-card>
            <h3 class="text-xl font-semibold">Jumlah Transaksi</h3>
            <p>{{ $transactionCount }}</p>
        </x-card>
        <x-card>
            <h3 class="text-xl font-semibold">Total Membership</h3>
            <p>{{ $membershipCount }}</p>
        </x-card>
        @role('Dokter')
        <x-card>
            <h3 class="text-xl font-semibold">Jumlah Balasan</h3>
            <p>{{ $balasanCount }}</p>
        </x-card>
        @endrole
    </div>
@endsection

@section('content')
    
@endsection