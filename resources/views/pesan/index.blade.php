<x-app-layout>
    <h1 class="text-2xl font-bold">Daftar Obat</h1>

    <div class="my-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-6">
        @foreach ($listObat as $obat)
            <x-card>
                @if ($obat->image)
                <img src="{{ asset('/storage/obat/'.$obat->image) }}" alt="{{ $obat->nama }}" width="100">
                @endif
                <p class="font-medium capitalize">{{ $obat->nama }}</p>  
                <p class="text-sm font-light line-clamp-2">{{ $obat->keterangan }}</p>
            </x-card>            
        @endforeach
    </div>
</x-app-layout>