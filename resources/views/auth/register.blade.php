<x-auth-layout>
    <x-slot:title>
        Create an account
    </x-slot:title>
    <x-slot:desc>
        Sudah mempunyai akun ? <a href="/login" class="text-blue-500 underline underline-offset-4">login</a> sekarang.
    </x-slot:desc>

    <form action="{{ route('register') }}" method="POST" class="[&>div]:mb-3">
        @csrf
        <div>
            <x-label>Username</x-label>
            <x-input name='name' placeholder="johndoe" value="{{ old('username') }}" />
            @error('name')
                <x-input-error>{{ $message }}</x-input-error>
            @enderror
        </div>
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
            <x-button class="w-full">Register</x-button>
        </div>
    </form>
</x-auth-layout>