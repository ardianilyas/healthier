@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">Riwayat Konsultasi bulan ini</h1>

    <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @forelse ($consultations as $consultation)
            <x-card>
                <b>Keluhan : </b><a href="{{ route('konsultasi.detail', $consultation->id) }}" class="text-blue-500 underline underline-offset-4 line-clamp-3">{{ $consultation->konsultasi }}</a>
                <p class="mt-2 {{ $consultation->status == 'dibalas' ? 'text-green-600' : 'text-red-600' }}"><b class="text-neutral-900">Status : </b> {{ $consultation->status }}</p>
            </x-card>
        @empty
            <x-card>
                <p class="text-neutral-600">Riwayat konsultasi kosong</p>
            </x-card>
        @endforelse
    </div>
@endsection