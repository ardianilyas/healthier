<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $pageTitle ?? "Auth" }}</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('drugs.png') }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @notifyCss
    </head>
    <body class="antialiased relative bg-gray-50 min-h-screen w-full">
        <div class="min-h-screen w-full flex justify-center items-center">
            <div class="lg:basis-1/2 basis-full px-6 lg:px-12 flex w-full min-h-screen justify-center items-center">
                <div class="bg-white p-6 rounded-md shadow-md w-full">
                    @if (isset($title))
                        <h3 class="text-2xl font-medium">{{ $title }}</h3>
                    @endif
                    @if (isset($desc))
                        <p class="text-neutral-600 font-light">{{ $desc }}</p>
                    @endif
                    <div class="my-8">
                        {{ $slot }}
                    </div>
                </div>
            </div>
            <div class="lg:basis-1/2 basis-0 hidden lg:block">
                <img src="{{ asset('auth/UI/auth.png') }}" alt="">
            </div>
        </div>
        <x-notify::notify />
        @notifyJs
    </body>
</html>