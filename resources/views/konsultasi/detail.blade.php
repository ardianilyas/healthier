@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">Detail Konsultasi</h1>

    <x-card class="mt-6">
        <b>Nama pasien : {{ $konsultasi->user->name }}</b>
        <p class="text-sm text-neutral-500">{{ $konsultasi->created_at->diffForHumans() }}</p>
        <p class="mt-3"><b>Keluhan :</b> {{ $konsultasi->konsultasi }}</p>
        @forelse ($listBalasan as $balasan)
            <div class="ml-10 mt-4">
                <p class=""><b>Balasan oleh {{ $balasan->user->name }} : </b>{{ $balasan->balasan }}</p>
                <p class="text-sm text-neutral-500">{{ $balasan->created_at->diffForHumans() }}</p>
            </div>
        @empty
            
        @endforelse

        @role('Dokter')
        <form action="{{ route('balasan.balas', $konsultasi->id) }}" method="POST" class="mt-6 ml-10 max-w-2xl [&>div]:mb-4">
            @csrf
            <div>
                <x-label>Balas keluhan</x-label>
                <x-textarea name="balasan" placeholder="Balas keluhan pasien disini"></x-textarea>
                @error('balas')
                    <x-input-error>{{ $message }}</x-input-error>
                @enderror
            </div>
            <div>
                <button class="px-4 py-2 font-semibold text-white bg-neutral-800 hover:bg-neutral-900 rounded-md shadow-md disabled:bg-neutral-600">Balas</button>
            </div>
        </form>
        @endrole
    </x-card>
@endsection