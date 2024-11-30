@extends('layouts.app')

@section('content')
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
    </x-card>
@endsection

@push('script')
   
@endpush