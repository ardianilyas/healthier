@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">Konsultasi</h1>

    @auth
        @if(Auth::user()->is_membership)
        <x-card class="my-6">
            <form action="" class="max-w-2xl ">
                <x-label>Konsultasi</x-label>
                <x-input />
            </form>
        </x-card>
        @else
        Membership terlebih dahulu untuk mulai melakukan konsultasi !.      
        @endif
    @endauth
@endsection