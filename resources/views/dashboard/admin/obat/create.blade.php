<x-dashboard>
    <x-slot:title>Tambah Obat</x-slot:title>
    <x-slot:desc>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, veritatis.</x-slot:desc>

    <x-card>
        <form action="{{ route('dashboard.obat.store') }}" enctype="multipart/form-data" class="[&>div]:mb-3" method="POST">
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
                <x-input name='nama' value="{{ old('nama') }}" placeholder="Panadol" />
                @error('nama')
                <x-input-error>{{ $message }}</x-input-error>
                @enderror
            </div>
            <div>
                <x-label>Satuan</x-label>
                <x-input name='satuan' value="{{ old('satuan') }}" placeholder="Tablet" />
                @error('satuan')
                <x-input-error>{{ $message }}</x-input-error>
                @enderror
            </div>
            <div>
                <x-label>Harga</x-label>
                <x-input type='number' value="{{ old('harga') }}" name='harga' placeholder="10000" />
                @error('harga')
                <x-input-error>{{ $message }}</x-input-error>
                @enderror
            </div>
            <div>
                <x-label>Keterangan</x-label>
                <x-input name='keterangan' value="{{ old('keterangan') }}" placeholder="Keterangan" />
                @error('keterangan')
                <x-input-error>{{ $message }}</x-input-error>
                @enderror
            </div>
            <div>
                <x-button type='submit'>Tambah</x-button>
            </div>
        </form>
    </x-card>
</x-dashboard>