<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? "Healthier - Dashboard" }}</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('drugs.png') }}">

        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-gray-50 min-h-screen w-full">

        <!-- ========== MAIN CONTENT ========== -->
        <!-- Breadcrumb -->
        <div class="sticky top-0 inset-x-0 z-20 bg-white border-y px-4 sm:px-6 lg:px-8 lg:hidden dark:bg-neutral-800 dark:border-neutral-700">
            <div class="flex items-center py-2">
                <!-- Navigation Toggle -->
                <button type="button" class="size-8 flex justify-center items-center gap-x-2 border border-gray-200 text-gray-800 hover:text-gray-500 rounded-lg focus:outline-none focus:text-gray-500 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:text-neutral-200 dark:hover:text-neutral-500 dark:focus:text-neutral-500" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-application-sidebar" aria-label="Toggle navigation" data-hs-overlay="#hs-application-sidebar">
                    <span class="sr-only">Toggle Navigation</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M15 3v18"/><path d="m8 9 3 3-3 3"/></svg>
                </button>
                <!-- End Navigation Toggle -->
            </div>
        </div>
        <!-- End Breadcrumb -->
        
        <!-- Sidebar -->
        <div id="hs-application-sidebar" class="hs-overlay [--auto-close:lg]
        hs-overlay-open:translate-x-0
        -translate-x-full transition-all duration-300 transform
        w-[260px] h-full
        hidden
        fixed inset-y-0 start-0 z-[60]
        bg-neutral-800
        lg:block lg:translate-x-0 lg:end-auto lg:bottom-0
        dark:bg-neutral-800 dark:border-neutral-700" role="dialog" tabindex="-1" aria-label="Sidebar">
            <div class="relative flex flex-col h-full max-h-full">
                <div class="px-8 pt-4">
                    <!-- Logo -->
                    <a href="/" class="text-white text-2xl font-semibold">Healthier</a>
                    <!-- End Logo -->
                </div>

                <!-- Content -->
                <div class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
                    <nav class="hs-accordion-group p-3 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
                        <ul class="flex flex-col space-y-1">
                            <li>
                                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-white rounded-lg hover:bg-white/10 focus:outline-none focus:bg-white/10 dark:bg-neutral-700 dark:text-white {{ request()->routeIs('dashboard.index') ? 'bg-white/10' : '' }}" href="dashboard">
                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-white rounded-lg hover:bg-white/10 focus:outline-none focus:bg-white/10 dark:bg-neutral-700 dark:text-white {{ request()->routeIs('dashboard.obat*') ? 'bg-white/10' : '' }}" href="dashboard">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                                    </svg>                                      
                                    Obat
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- End Content -->
            </div>
        </div>
        <!-- End Sidebar -->
        
        <!-- Content -->
        <div class="w-full pt-10 px-4 sm:px-6 md:px-8 lg:ps-72">
            {{ $slot }}
            <!-- your content goes here ... -->
        </div>
        <!-- End Content -->
        <!-- ========== END MAIN CONTENT ========== -->

    </body>
</html>

