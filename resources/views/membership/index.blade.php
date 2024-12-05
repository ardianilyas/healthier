@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">Membership</h1>
    <p class="text-neutral-800">Untuk dapat mengakses fitur konsultasi penyakit, silahkan untuk membeli membership yang tersedia dibawah ini.</p>

    
    @auth
        {{-- <p>{{ Auth::user()->membership->transactions }}</p> --}}
        @if (Auth::user()->memberships->count() > 0)    
            <x-card class="max-w-lg mt-4">
                Your last membership : <b>{{ Auth::user()->membership->plan->name }}</b> end at {{ \Carbon\Carbon::parse(Auth::user()->membership->end_date)->format("l, d F Y") }}
                <p class="mt-4 text-red-500 text-sm">Note : Anda tidak bisa membeli membership jika status Anda saat ini sudah menjadi membership (tunggu membership Anda berakhir).</p>
            </x-card>
        @endif
    @endauth


    @guest
        <p class="mt-2 font-medium text-neutral-400">Note : Login untuk dapat membeli membership</p>
    @endguest

    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($plans as $plan)
            <x-card>
                <h1 class="text-2xl text-neutral-800 font-semibold">{{ $plan->name }}</h1>
                <p class="mt-2 text-lg text-neutral-500">Rp. {{ Number::format($plan->price, locale:'id') }}</p>
                <p class="mb-6 text-neutral-600 line-clamp-2 font-light">{{ $plan->description }}</p>
                
                @auth
                    @if(!Auth::user()->is_membership)
                        <a href="{{ route('membership.buy', $plan->id) }}" class="px-5 py-3 font-semibold text-white bg-neutral-800 hover:bg-neutral-900 rounded-md shadow-md disabled:bg-neutral-600">Buy Membership</a>
                    @endif
                @endauth

            </x-card>
        @endforeach
    </div>
@endsection