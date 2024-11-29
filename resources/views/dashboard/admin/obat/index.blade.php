@extends('layouts.dashboard')

@section('content')
    <x-primary-link href="{{ route('dashboard.obat.create') }}">Tambah Obat</x-primary-link>
    <div class="grid grid-cols-3 gap-4">
        @foreach ($listObat as $obat)
        <x-card>
            <div class="h-full flex flex-col justify-between">
                <div>
                    @if (isset($obat->image))
                    <img src="{{ asset('storage/obat/'. $obat->image) }}" alt="" class="w-20">                      
                    @endif
                    <h4 class="text-xl text-neutral-800 font-medium">{{ $obat->nama }}</h4>
                    <p class="text-sm text-neutral-600 mt-1 line-clamp-2">{{ $obat->keterangan }}</p>
                </div>
                <div class="flex mt-3 gap-3">
                    <x-edit-link href="{{ route('dashboard.obat.edit', $obat->id) }}" >Edit</x-edit-link>
                    <form action="{{ route('dashboard.obat.destroy', $obat->id) }}" method="POST">
                        @method("DELETE")
                        @csrf
                        <x-delete-button class="px-5 py-2 text-sm text-white font-medium rounded-md bg-red-500 hover:bg-red-600 shadow-md">Delete</x-delete-button>
                    </form>
                </div>
            </div>
        </x-card>
        @endforeach
    </div>
@endsection