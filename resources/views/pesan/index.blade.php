@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">Daftar Obat</h1>

    <div class="my-6 grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6">
        @foreach ($listObat as $obat)
            <x-card>
                <div class="flex flex-col h-full justify-between">
                    <div>
                        <div class="flex justify-center">
                            @if ($obat->image)
                            <img src="{{ asset('/storage/obat/'.$obat->image) }}" alt="{{ $obat->nama }}" width="120">
                            @else
                            <img src="{{ asset('image-placeholder.png') }}" width="120" alt="">
                            @endif
                        </div>
                        <p class="mt-3 text-lg text-neutral-800 font-medium capitalize">{{ $obat->nama }}</p>  
                        <p class="text-sm text-neutral-600 font-light line-clamp-2">{{ $obat->keterangan }}</p>
                    </div>
                    <div class="mt-6">
                        <form action="{{ route('keranjang.add', $obat->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="px-4 py-2 text-white rounded-md shadow-md bg-blue-700 hover:bg-blue-800 transition-all ease-in-out">Add to cart</button>
                        </form>
                    </div>
                </div>
            </x-card>            
        @endforeach
    </div>
@endsection