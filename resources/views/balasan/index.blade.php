@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">Daftar Konsultasi</h1>

    <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @forelse ($consultation as $konsultasi)
            <x-card>
                <a href="{{ route('konsultasi.detail', $konsultasi->id) }}">
                    <span class="mb-2 inline-flex">
                        @if ($konsultasi->status === 'belum dibalas')
                            <p class="inline-flex text-xs px-3 py-1 rounded-full bg-red-200 text-red-800">{{ $konsultasi->status }}</p>
                        @else
                            <p class="inline-flex text-xs px-3 py-1 rounded-full bg-green-200 text-green-800">{{ $konsultasi->status }}</p>
                        @endif
                    </span>
                    <p class="text-sm text-neutral-600">{{ $konsultasi->created_at->diffForHumans() }}</p>
                    <p><b>Nama pasien :</b> {{ $konsultasi->user->name }}</p>
                    <p class="line-clamp-3"><b>Keluhan : </b>{{ $konsultasi->konsultasi }}</p>
                    {{-- <p><b>Status : </b>{{ $konsultasi->status }}</p> --}}
                </a>
            </x-card>
        @empty
            
        @endforelse
    </div>
@endsection