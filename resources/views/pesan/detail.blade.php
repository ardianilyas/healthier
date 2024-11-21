<x-app-layout>
    <x-card class="">
        <h1 class="text-2xl font-bold">Detail obat : {{ $obat->nama }}</h1>
        <p>{{ $obat->keterangan }}</p>
        @if (!is_null($obat->image))
            <img src="{{ asset('/storage/obat/'.$obat->image) }}" width="120" alt="{{ $obat->nama }}">
        @else
            <img src="{{ asset('image-placeholder.png') }}" width="240" alt="{{ $obat->nama }}">
        @endif
        <p>Satuan : {{ $obat->satuan }}</p>
        <p>Harga satuan : Rp {{ number_format($obat->harga, '0', ',', '.') }}</p>
        <form action="" class="my-2">
            <div>
                <label for="quantity">Jumlah yang ingin dibeli : </label>
                <x-input type="number" id="quantity" name="quantity" min="1" required />
            </div>
            <x-primary-link type="submit" class="my-3">Pesan obat</x-primary-link>
        </form>
    </x-card>
</x-app-layout>