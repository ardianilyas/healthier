<!doctype html>
<html class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $title ?? "Healthier" }}</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('drugs.png') }}">

        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Albert+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <style>
        body {
            font-family: "Albert Sans", sans-serif;
        }
    </style>
    <body class="antialiased relative bg-gray-50">
        <x-notify::notify />
        <div class="flex flex-col justify-between min-h-screen w-full">
            
            <div>
                
                <x-notify::notify class="z-20" />
                
                <x-navbar />

                <div  class="px-8 md:px-10 lg:px-10 py-12">
                    @yield('content')
                </div>

            </div>
    
            <x-footer />
        </div>

        @stack('script')
    </body>
</html>