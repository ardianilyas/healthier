@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">Keranjang</h1>

    <x-card class="my-8">
        @if (!is_null($cart))
            @foreach ($cart->items as $item)
                <div class="mb-5 max-w-md bg-gray-100 p-4 flex justify-between items-center rounded-md shadow-sm" id="item-{{ $item->id }}">
                    <div>
                        <p>Nama obat : {{ $item->obat->nama }}</p>
                        <p>Jumlah : {{ $item->quantity }}</p>
                        <p>Total harga : Rp. {{ number_format($item->obat->harga * $item->quantity, 2) }}</p>
                    </div>
                    <button type="button" id="remove" data-id={{ $item->id }} class="px-5 py-2 text-xs text-white font-semibold bg-red-500 hover:bg-red-600 rounded-md shadow-md">Hapus item</button>
                </div>
            @endforeach

            <div class="mt-6">
                <b>Total harga : Rp. {{ number_format($totalHarga, 2) }}</b>
            </div>
        @else
            <p>Your cart is empty</p>
        @endif
    </x-card>
@endsection

@push('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).on('click', '#remove', function(e) {
            e.preventDefault(); // Prevent default action

            let itemId = $(this).data('id'); // Get item ID

            if (confirm('Are you sure you want to delete this item ? ' + itemId)) {
                $.ajax({
                    url: `/keranjang/${itemId}/delete`,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}' // CSRF token for security
                    },
                    success: function(response) {
                        alert(response.message);
                        // Remove the item from the DOM
                        $(`#item-${itemId}`).remove();
                    },
                });
            }
        });
    </script>
@endpush