<x-app-layout>
    <h1 class="text-2xl font-bold">Daftar Obat</h1>

    <div class="my-6 grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6">
        @foreach ($listObat as $obat)
            <x-card>
                <a href="" class="hover:bg-gray-50">
                    <div class="flex justify-center">
                        @if ($obat->image)
                        <img src="{{ asset('/storage/obat/'.$obat->image) }}" alt="{{ $obat->nama }}" width="120">
                        @else
                        <img src="{{ asset('image-placeholder.png') }}" width="120" alt="">
                        @endif
                    </div>
                    <p class="mt-3 text-lg text-neutral-800 font-medium capitalize">{{ $obat->nama }}</p>  
                    <p class="text-sm text-neutral-600 font-light line-clamp-2">{{ $obat->keterangan }}</p>
                    <x-primary-link class="mt-3">Detail obat</x-primary-link>
                </a>
            </x-card>            
        @endforeach
    </div>
</x-app-layout>