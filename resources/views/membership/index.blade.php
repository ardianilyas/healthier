<x-app-layout>
    <h1 class="text-2xl font-bold">Membership</h1>

    <x-card class="max-w-md">
        Current membership status :
        @if (!is_null($membership))
            <p>{{ $membership->plan->name }}</p>
        @else
            <p>don't have membership</p>
        @endif
    </x-card>

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
</x-app-layout>