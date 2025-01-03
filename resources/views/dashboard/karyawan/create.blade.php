@extends('layouts.dashboard')

@section('heading')
<x-h1>Tambah data karyawan / dokter</x-h1>
<x-p>Form tambah data karyawan / dokter</x-p>
@endsection

@section('content')    
    <x-card>
        <form action="{{ route('dashboard.karyawan.store') }}" method="POST" class="[&>div]:mb-3">
            @csrf
            <div>
                <x-label>Username</x-label>
                <x-input name='name' placeholder="username" value="{{ old('name') }}" />
                @error('name')
                    <x-input-error>{{ $message }}</x-input-error>
                @enderror
            </div>
            <div>
                <x-label>Role</x-label>
                <select name="role" class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                    <option selected="" value="">Select role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @error('role')
                    <x-input-error>{{ $message }}</x-input-error>
                @enderror
            </div>
            <div>
                <x-label>Email</x-label>
                <x-input name='email' placeholder="email@mail.com" value="{{ old('email') }}" />
                @error('email')
                    <x-input-error>{{ $message }}</x-input-error>
                @enderror
            </div>
            <div>
                <x-label>Password</x-label>
                <x-input type="password" name='password' placeholder="*******" />
                @error('password')
                    <x-input-error>{{ $message }}</x-input-error>
                @enderror
            </div>
            <div>
                <x-button type="submit">Create</x-button>
            </div>
        </form>
    </x-card>
@endsection