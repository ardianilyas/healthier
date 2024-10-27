<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? "Healthier" }}</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('drugs.png') }}">

        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <style>
        body {
            font-family: "Poppins", sans-serif;
        }
    </style>
    <body class="antialiased relative flex flex-col justify-between bg-gray-50 min-h-screen w-full">

        <x-navbar />

        <div class="px-8 md:px-10 lg:px-10 py-12">
            {{ $slot }}
        </div>

        <x-footer />

    </body>
</html>