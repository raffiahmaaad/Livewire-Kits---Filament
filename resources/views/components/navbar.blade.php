<nav x-data="{ open: false }"
    class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">ShoesStore</span>
        </a>
        <!-- Desktop Auth Buttons + Theme Switcher -->
        <div class="hidden md:flex md:order-2 items-center space-x-3 md:space-x-0 rtl:space-x-reverse">
            <button x-data="{
                dark: document.documentElement.classList.contains('dark'),
                toggle() {
                    this.dark = !this.dark;
                    document.documentElement.classList.toggle('dark', this.dark);
                    localStorage.setItem('theme', this.dark ? 'dark' : 'light');
                }
            }" @click="toggle()"
                class="p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 bg-transparent hover:bg-gray-100 dark:hover:bg-gray-800"
                aria-label="Toggle dark mode">
                <svg x-show="!dark" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-zinc-500" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 12.79A9 9 0 1111.21 3a7 7 0 009.79 9.79z" />
                </svg>
                <svg x-show="dark" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-zinc-500 dark:text-white"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 3v1m0 16v1m8.66-13.66l-.71.71M4.05 19.07l-.71.71M21 12h-1M4 12H3m16.66 5.66l-.71-.71M4.05 4.93l-.71-.71M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
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
            <button x-data="{
                dark: document.documentElement.classList.contains('dark'),
                toggle() {
                    this.dark = !this.dark;
                    document.documentElement.classList.toggle('dark', this.dark);
                    localStorage.setItem('theme', this.dark ? 'dark' : 'light');
                }
            }" @click="toggle()"
                class="p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 bg-transparent hover:bg-gray-100 dark:hover:bg-gray-800"
                aria-label="Toggle dark mode">
                <svg x-show="!dark" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-zinc-500" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 12.79A9 9 0 1111.21 3a7 7 0 009.79 9.79z" />
                </svg>
                <svg x-show="dark" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-zinc-500 dark:text-white"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 3v1m0 16v1m8.66-13.66l-.71.71M4.05 19.07l-.71.71M21 12h-1M4 12H3m16.66 5.66l-.71-.71M4.05 4.93l-.71-.71M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
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
                class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="{{ route('home') }}"
                        class="block py-2 px-3 rounded-sm md:p-0 md:bg-transparent md:dark:bg-transparent md:dark:hover:bg-transparent md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 {{ request()->routeIs('home') ? 'text-blue-700 font-bold md:text-blue-700 md:dark:text-blue-500' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white' }}"
                        aria-current="page">Home</a>
                </li>
                <li>
                    <a href="{{ route('about') }}"
                        class="block py-2 px-3 rounded-sm md:p-0 md:bg-transparent md:dark:bg-transparent md:dark:hover:bg-transparent md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 {{ request()->routeIs('about') ? 'text-blue-700 font-bold md:text-blue-700 md:dark:text-blue-500' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white' }}">About</a>
                </li>
                <li>
                    <a href="{{ route('products') }}"
                        class="block py-2 px-3 rounded-sm md:p-0 md:bg-transparent md:dark:bg-transparent md:dark:hover:bg-transparent md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 {{ request()->routeIs('products') ? 'text-blue-700 font-bold md:text-blue-700 md:dark:text-blue-500' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white' }}">Products</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 rounded-sm md:p-0 md:bg-transparent md:dark:bg-transparent md:dark:hover:bg-transparent md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">Contact</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Mobile menu -->
    <div x-show="open" x-transition
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
