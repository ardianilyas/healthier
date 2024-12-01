@extends('layouts.app')

@section('content')
    <x-card>
        <h1 class="text-2xl font-bold mb-4">Detail Pembayaran</h1>
        <h3 class="text-xl font-medium text-neutral-800">{{ $plan->name }} Plan</h3>
        <p class="text-neutral-600">{{ $plan->description }}</p>
        <p>Price : Rp. {{ Number::format($plan->price, locale: 'id') }}</p>

        @if (!Auth::user()->is_membership)
            <button onclick="pay({{ $plan->id }})" class="px-4 py-2 my-4 text-sm font-semibold text-white bg-neutral-800 hover:bg-neutral-900 rounded-md shadow-md disabled:bg-neutral-600">Bayar Sekarang</button>
        @endif
    </x-card>
    
@endsection

@push('script')
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>

    <script>
        function pay(planId) {
            fetch(`/membership/${planId}/buy`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                
                window.snap.pay(data.snap_token, {
                    onSuccess: function(result) {
                        alert('Payment successful!');
                        console.log(result);
                        window.location.href = "/membership"
                    },
                    onPending: function() {
                        alert('Waiting for payment!');
                    },
                    onError: function() {
                        alert('Payment failed!');
                    },
                    onClose: function() {
                        alert('Payment popup closed!');
                    },
                });
            });
        }
    </script>
@endpush