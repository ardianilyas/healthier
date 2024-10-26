<x-auth-layout>
    <x-slot:title>
        Welcome back, login first !
    </x-slot:title>
    <x-slot:desc>
        Belum mempunyai akun ? <a href="/register" class="text-blue-500 underline underline-offset-4">register</a> sekarang.
    </x-slot:desc>
    
    <form action="{{ route('authenticate') }}" method="POST" class="[&>div]:mb-3">
        @csrf
        <div>
            <x-label>Email</x-label>
            <x-input name='email' placeholder="johndoe@mail.com" value="{{ old('email') }}" />
            @error('email')
                <x-input-error>{{ $message }}</x-input-error>
            @enderror
        </div>
        <div>
            <x-label>Password</x-label>
            <x-input name='password' type='password' placeholder="********" />
            @error('password')
                <x-input-error>{{ $message }}</x-input-error>
            @enderror
        </div>
        <div class="mt-8">
            <x-button class="w-full">Login</x-button>
        </div>
    </form>
</x-auth-layout>