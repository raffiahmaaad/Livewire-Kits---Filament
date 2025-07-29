<nav x-data="{
    open: false,
    dark: document.documentElement.classList.contains('dark'),
    init() {
        // Initialize theme state properly
        this.dark = document.documentElement.classList.contains('dark');
        // Add loaded class to prevent initial flash
        this.$el.classList.add('navbar-loaded');
    }
}" x-init="init()"
    class="bg-white dark:bg-gray-900 fixed top-0 left-0 right-0 w-full z-50 border-b border-gray-200 dark:border-gray-600"
    style="position: fixed !important; top: 0 !important; left: 0 !important; right: 0 !important; z-index: 9999 !important;"
    x-cloak>
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">ShoesStore</span>
        </a>
        <!-- Desktop Auth Buttons + Theme Switcher -->
        <div class="hidden md:flex md:order-2 items-center space-x-3 md:space-x-0 rtl:space-x-reverse ml-2">
            <button
                @click="dark = !dark; document.documentElement.classList.toggle('dark', dark); localStorage.setItem('theme', dark ? 'dark' : 'light')"
                class="p-4 rounded-lg focus:ring-blue-300 bg-transparent hover:bg-gray-100 dark:hover:bg-gray-800"
                aria-label="Toggle dark mode">
                <svg x-show="!dark" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-zinc-500"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 12.79A9 9 0 1111.21 3a7 7 0 009.79 9.79z" />
                </svg>
                <svg x-show="dark" x-cloak xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-zinc-500 dark:text-white">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                </svg>
            </button>
            @auth
                <a href="{{ url('/dashboard') }}"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-2">Dashboard</a>
            @else
                <a href="{{ route('login') }}"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 mr-2 dark:focus:ring-blue-800 ml-2">Login</a>
            @endauth
        </div>
        <!-- Hamburger Button + Mobile Theme Switcher -->
        <div class="flex md:hidden items-center space-x-2">
            <button
                @click="dark = !dark; document.documentElement.classList.toggle('dark', dark); localStorage.setItem('theme', dark ? 'dark' : 'light')"
                class="p-4 rounded-lg focus:ring-2 focus:ring-blue-300 bg-transparent hover:bg-gray-100 dark:hover:bg-gray-800"
                aria-label="Toggle dark mode">
                <!-- Moon icon for light mode (show moon when in light mode to switch to dark) -->
                <svg x-show="!dark" x-cloak xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 text-zinc-600 dark:text-zinc-400" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                </svg>
                <!-- Sun icon for dark mode (show sun when in dark mode to switch to light) -->
                <svg x-show="dark" x-cloak xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-zinc-600 dark:text-zinc-300">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                </svg>
            </button>
            <button @click="open = !open" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <!-- Desktop Menu -->
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul
                class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
                <li>
                    <a href="{{ route('home') }}"
                        class="block py-2 px-3 rounded-sm md:p-0 md:bg-transparent md:dark:bg-transparent md:dark:hover:bg-transparent md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 {{ request()->routeIs('home') ? 'text-blue-700 font-bold md:text-blue-700 md:dark:text-blue-500' : 'text-gray-900 dark:text-white md:hover:bg-transparent md:dark:hover:bg-transparent hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white' }}"
                        aria-current="page">Home</a>
                </li>
                <li>
                    <a href="{{ route('about') }}"
                        class="block py-2 px-3 rounded-sm md:p-0 md:bg-transparent md:dark:bg-transparent md:dark:hover:bg-transparent md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 {{ request()->routeIs('about') ? 'text-blue-700 font-bold md:text-blue-700 md:dark:text-blue-500' : 'text-gray-900 dark:text-white md:hover:bg-transparent md:dark:hover:bg-transparent hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white' }}">About</a>
                </li>
                <li>
                    <a href="{{ route('products') }}"
                        class="block py-2 px-3 rounded-sm md:p-0 md:bg-transparent md:dark:bg-transparent md:dark:hover:bg-transparent md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 {{ request()->routeIs('products') ? 'text-blue-700 font-bold md:text-blue-700 md:dark:text-blue-500' : 'text-gray-900 dark:text-white md:hover:bg-transparent md:dark:hover:bg-transparent hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white' }}">Products</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 rounded-sm md:p-0 md:bg-transparent md:dark:bg-transparent md:dark:hover:bg-transparent md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">Contact</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Mobile menu -->
    <div x-show="open" x-transition x-cloak
        class="md:hidden w-full bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700">
        <ul class="flex flex-col p-4 font-medium space-y-1">
            <li>
                <a href="{{ route('home') }}"
                    class="block py-2 px-3 rounded {{ request()->routeIs('home') ? 'text-blue-700 font-bold dark:text-blue-500' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white' }}">Home</a>
            </li>
            <li>
                <a href="{{ route('about') }}"
                    class="block py-2 px-3 rounded {{ request()->routeIs('about') ? 'text-blue-700 font-bold dark:text-blue-500' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white' }}">About</a>
            </li>
            <li>
                <a href="{{ route('products') }}"
                    class="block py-2 px-3 rounded {{ request()->routeIs('products') ? 'text-blue-700 font-bold dark:text-blue-500' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white' }}">Products</a>
            </li>
            <li>
                <a href="#"
                    class="block py-2 px-3 rounded text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">Contact</a>
            </li>
            <li class="border-t border-gray-200 dark:border-gray-700 pt-3 mt-2 flex flex-col space-y-2">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="block py-2 px-3 text-white bg-blue-700 rounded-lg text-center hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="block py-2 px-3 text-white bg-blue-700 rounded-lg text-center hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700">Login</a>
                @endauth
            </li>
        </ul>
    </div>
</nav>
