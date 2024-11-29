@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">Membership</h1>

    @auth
    <x-card class="max-w-lg mt-4">
        Your last membership : <b>{{ Auth::user()->membership->plan->name }}</b> end at {{ \Carbon\Carbon::parse(Auth::user()->membership->end_date)->format("l, d F Y") }}
    </x-card>
    @endauth

    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($plans as $plan)
            <x-card>
                <h1 class="text-2xl text-neutral-800 font-medium">{{ $plan->name }}</h1>
                <p class="mt-2 text-lg text-neutral-500">Rp. {{ number_format($plan->price, '0', ',', '.') }}</p>
                <p class="mb-4 text-neutral-600 line-clamp-2">{{ $plan->description }}</p>
                <x-primary-link>Membership</x-primary-link>
            </x-card>
        @endforeach
    </div>
@endsection