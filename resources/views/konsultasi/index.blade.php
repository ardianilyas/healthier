@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">Konsultasi</h1>

    @auth
        @if(Auth::user()->is_membership)
        <a href="/konsultasi/riwayat" class="inline-flex mt-3 px-4 py-2 text-white font-medium bg-neutral-900 rounded-md shadow-md">Riwayat Konsultasi</a>
        <x-card class="my-6">
            <form action="{{ route('konsultasi.konsultasi') }}" method="POST" class="max-w-2xl [&>div]:mb-3">
                @csrf
                <div>
                    <x-label>Konsultasi</x-label>
                    <x-textarea name="konsultasi" placeholder="Deskripsikan keluhan anda disini"></x-textarea>
                    @error('konsultasi')
                        <x-input-error>{{ $message }}</x-input-error>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="px-4 py-2 font-semibold text-white bg-neutral-800 hover:bg-neutral-900 rounded-md shadow-md disabled:bg-neutral-600">Konsultasi</button>
                </div>
            </form>
        </x-card>
        @else
        <p class="mt-4">Membership terlebih dahulu untuk mulai melakukan konsultasi !. </p>     
        @endif
    @endauth
@endsection