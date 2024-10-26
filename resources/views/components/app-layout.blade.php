<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? "Healthier" }}</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('drugs.png') }}">

        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased relative flex flex-col justify-between bg-gray-50 min-h-screen w-full">

        <x-navbar />

        <div class="px-8 md:px-10 lg:px-10 py-12">
            {{ $slot }}
        </div>

        <x-footer />

    </body>
</html>