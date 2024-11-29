@extends('layouts.dashboard')

@section('heading')
<x-h1>Edit obat - {{ $obat->nama }}</x-h1>
<x-p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic sunt molestiae modi.</x-p>
@endsection

@section('content')
    <x-card>
        <form action="{{ route('dashboard.obat.update', $obat->id) }}" enctype="multipart/form-data" class="[&>div]:mb-3" method="POST">
            @method("PATCH")
            @csrf
            <div>
                <x-label>Image</x-label>
                <x-file-input name='image' />
                @error('image')
                <x-input-error>{{ $message }}</x-input-error>
                @enderror
            </div>
            <div>
                <x-label>Nama</x-label>
                <x-input name='nama' value="{{ old('nama', $obat->nama) }}" placeholder="Panadol" />
                @error('nama')
                <x-input-error>{{ $message }}</x-input-error>
                @enderror
            </div>
            <div>
                <x-label>Satuan</x-label>
                <x-input name='satuan' value="{{ old('satuan', $obat->satuan) }}" placeholder="Tablet" />
                @error('satuan')
                <x-input-error>{{ $message }}</x-input-error>
                @enderror
            </div>
            <div>
                <x-label>Harga</x-label>
                <x-input type='number' value="{{ old('harga', $obat->harga) }}" name='harga' placeholder="10000" />
                @error('harga')
                <x-input-error>{{ $message }}</x-input-error>
                @enderror
            </div>
            <div>
                <x-label>Keterangan</x-label>
                <x-input name='keterangan' value="{{ old('keterangan', $obat->keterangan) }}" placeholder="Keterangan" />
                @error('keterangan')
                <x-input-error>{{ $message }}</x-input-error>
                @enderror
            </div>
            <div>
                <x-button type='submit'>Update</x-button>
            </div>
        </form>
    </x-card>
@endsection