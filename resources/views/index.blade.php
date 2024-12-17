@extends('layouts.app')

@section('content')
     {{-- Hero section --}}
     <section class="w-full pb-32 flex flex-col-reverse lg:flex-row items-center justify-between">
        <div class="basis-full lg:basis-1/2">
            <h1 class="text-4xl font-bold">Healthier siap melayani keluhan penyakit anda secara Online.</h1>
            <p class="text-neutral-600 mt-2">Healthier merupakan apotek online yang akan selalu ada untuk anda yang membutuhkan konsultasi online tanpa harus datang langsung ke dokter.</p>
            <x-primary-link href="#layanan" class="mt-4">Lihat Layanan</x-primary-link>
        </div>
        <div class="basis-full lg:basis-1/2 p-4 flex justify-center items-center">
            <img src="{{ asset('UI/Object.png') }}" class="w-[320px] lg:w-[450px]" alt="">
        </div>
    </section>

    {{-- Daftar layanan section --}}
    <section id="layanan" class="before:content-[''] before:block before:h-24">
        <h2 class="text-3xl font-bold">Daftar Layanan</h2>
        <div class="my-8 grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-card>
                <div class="bg-[#27AE60] bg-opacity-10 p-4 rounded-full inline-flex">
                    <img src="{{ asset('icons/UI/017-heart.svg') }}" class="" alt="">
                </div>
                <div class="my-4">
                    <h2 class="text-2xl font-semibold">Konsultasi Penyakit</h2>
                    <p class="text-[15px] text-neutral-600 mt-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum, odit animi perspiciatis commodi temporibus facilis fugiat non dolores.</p>
                </div>
            </x-card>
            <x-card>
                <div class="bg-[#2F80ED] bg-opacity-10 p-4 rounded-full inline-flex">
                    <img src="{{ asset('icons/UI/005-syringe.svg') }}" class="" alt="">
                </div>
                <div class="my-4">
                    <h2 class="text-2xl font-semibold">Pesan Obat Online</h2>
                    <p class="text-[15px] text-neutral-600 mt-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum, odit animi perspiciatis commodi temporibus facilis fugiat non dolores.</p>
                </div>
            </x-card>
        </div>
    </section>

    {{-- Keunggulan section --}}
    <section class="before:content-[''] before:block before:h-48">
        <div class="flex justify-between items-center">
            <div class="basis-full lg:basis-1/2">
                <img src="{{ asset('UI/UI/Illustration 2.svg') }}" alt="">
            </div>
            <div class="basis-full lg:basis-1/2 p-12">
                <h2 class="text-3xl font-bold">Kami akan melayani anda dengan pelayanan terbaik</h2>
                <p class="text-neutral-600 mt-4">Berikut merupakan beberapa pelayanan yang pasti akan anda dapatkan :</p>

                <ul class="mt-8 [&>li]:mt-2">
                    <li class="flex items-center space-x-4">
                        <img src="{{ asset('UI/Group 1317.svg') }}" alt="">
                        <p class="text-neutral-500">Kualitas obat terbaik</p>
                    </li>
                    <li class="flex items-center space-x-4">
                        <img src="{{ asset('UI/Group 1317.svg') }}" alt="">
                        <p class="text-neutral-500">Fast respon</p>
                    </li>
                    <li class="flex items-center space-x-4">
                        <img src="{{ asset('UI/Group 1317.svg') }}" alt="">
                        <p class="text-neutral-500">Antar obat cepat tanpa menunggu lama</p>
                    </li>
                    <li class="flex items-center space-x-4">
                        <img src="{{ asset('UI/Group 1317.svg') }}" alt="">
                        <p class="text-neutral-500">Ramah</p>
                    </li>
                </ul>
            </div>
        </div>
    </section>
@endsection