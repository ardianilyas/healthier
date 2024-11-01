<div class="w-full py-4 sticky top-0 right-0 backdrop-filter backdrop-blur-lg bg-opacity-60 bg-white shadow-sm flex justify-center items-center">
    <div x-data="{ open: false }" class="w-full px-8 md:px-10 lg:px-12 flex flex-col md:flex-row justify-between items-start md:items-center">
        <div class="w-full md:w-auto flex justify-between items-center md:block">
            <h1 class="text-2xl font-semibold">Healthier</h1>
            <button @click="open = !open" class="md:hidden">
                <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" />
                </svg>
                <svg x-show="open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>                               
            </button>
        </div>
        <ul :class="open ? '' : 'hidden md:flex' " class="flex flex-col md:flex-row justify-start md:justify-center md:items-center my-3 md:my-0 gap-3 md:gap-5">
            <li><x-navbar-link :active="request()->routeIs('homepage')" href="/">Home</x-navbar-link></li>
            <li><x-navbar-link :active="request()->routeIs('artikel*')" href="/artikel">Artikel</x-navbar-link></li>
            <li><x-navbar-link :active="request()->routeIs('pesan*')" href="/pesan">Pesan Obat</x-navbar-link></li>
            <li><x-navbar-link :active="request()->routeIs('konsultasi*')" href="/konsultasi">Konsultasi</x-navbar-link></li>
            <li><x-navbar-link :active="request()->routeIs('membership*')" href="/membership">Membership</x-navbar-link></li>
        </ul>
        <div :class="open ? '' : 'hidden md:block' ">
            @auth
            <div class="hs-dropdown relative inline-flex">
                <button id="hs-dropdown-default" type="button" class="hs-dropdown-toggle p-1 flex items-end justify-end overflow-hidden gap-x-2 text-sm font-medium rounded-full transition-all ease-in-out bg-gray-100/70 text-gray-800 shadow-sm hover:bg-gray-100 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                    <img src="https://api.dicebear.com/9.x/notionists/svg?seed=Alexander" class="w-10 rounded-full bottom-0" alt="avatar" />
                </button>
                
                <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-default">
                    <div class="p-1 space-y-0.5">
                        <p class="p-2 font-medium">Welcome, {{ auth()->user()->name }}</p>
                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="/dashboard">
                            Dashboard
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-red-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
            @endauth
            @guest
            <ul class="flex justify-center items-center gap-2 mt-3 md:mt-0">
                <li><x-primary-button href="/login" class="bg-gradient-to-br from-[#3A8EF6] to-[#6F3AFA] text-white font-medium px-5 py-2 rounded-full">Login</x-primary-button></li>
                <li><x-primary-button href="/register" class="bg-gradient-to-br from-[#3A8EF6] to-[#6F3AFA] text-white font-medium px-5 py-2 rounded-full">Register</x-primary-button></li>
            </ul>
            @endguest
        </div>
    </div>
</div>