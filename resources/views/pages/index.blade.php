<?php

use function Laravel\Folio\name;

name('home');

?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Toko Sepatu Online - Koleksi Sepatu Terbaik</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preload" as="style" href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles -->
    @if (App::environment('local'))
        {{-- Mode development, gunakan Vite --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        {{-- Mode produksi, gunakan hasil build statis --}}
        <link rel="stylesheet" href="/build/assets/app.css">
        <script src="/build/assets/app.js" defer></script>
    @endif

    @livewireStyles
    @fluxAppearance
</head>

<body
    class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
        @if (Route::has('login'))
            <nav class="flex items-center justify-end gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>
    <div
        class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
        <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
            <div
                class="text-[13px] leading-[20px] flex-1 p-6 pb-12 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-es-lg rounded-ee-lg lg:rounded-ss-lg lg:rounded-ee-none">
                <h1 class="mb-1 font-medium text-2xl">Selamat Datang di Toko Sepatu Online</h1>
                <p class="mb-2 text-[#706f6c] dark:text-[#A1A09A]">Temukan koleksi sepatu terbaik untuk gaya hidup Anda. <br>Mulai jelajahi produk-produk unggulan kami.</p>

                <ul class="flex flex-col mb-4 lg:mb-6">
                    <li
                        class="flex items-center gap-4 py-2 relative before:border-l before:border-[#e3e3e0] dark:before:border-[#3E3E3A] before:top-1/2 before:bottom-0 before:left-[0.4rem] before:absolute">
                        <span class="relative py-1 bg-white dark:bg-[#161615]">
                            <span
                                class="flex items-center justify-center rounded-full bg-[#FDFDFC] dark:bg-[#161615] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] w-3.5 h-3.5 border dark:border-[#3E3E3A] border-[#e3e3e0]">
                                <span class="rounded-full bg-[#dbdbd7] dark:bg-[#3E3E3A] w-1.5 h-1.5"></span>
                            </span>
                        </span>
                        <span>
                            Jelajahi
                            <a href="{{ route('products') }}"
                                class="inline-flex items-center space-x-1 font-medium underline underline-offset-4 text-[#f53003] dark:text-[#FF4433] ms-1">
                                <span>Koleksi Sepatu</span>
                                <svg width="10" height="11" viewBox="0 0 10 11" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-2.5 h-2.5">
                                    <path d="M7.70833 6.95834V2.79167H3.54167M2.5 8L7.5 3.00001"
                                        stroke="currentColor" stroke-linecap="square" />
                                </svg>
                            </a>
                        </span>
                    </li>
                    <li
                        class="flex items-center gap-4 py-2 relative before:border-l before:border-[#e3e3e0] dark:before:border-[#3E3E3A] before:bottom-1/2 before:top-0 before:start-[0.4rem] before:absolute">
                        <span class="relative py-1 bg-white dark:bg-[#161615]">
                            <span
                                class="flex items-center justify-center rounded-full bg-[#FDFDFC] dark:bg-[#161615] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] w-3.5 h-3.5 border dark:border-[#3E3E3A] border-[#e3e3e0]">
                                <span class="rounded-full bg-[#dbdbd7] dark:bg-[#3E3E3A] w-1.5 h-1.5"></span>
                            </span>
                        </span>
                        <span>
                            Pelajari tentang
                            <a href="{{ route('about') }}"
                                class="inline-flex items-center space-x-1 font-medium underline underline-offset-4 text-[#f53003] dark:text-[#FF4433] ms-1">
                                <span>Tentang Kami</span>
                                <svg width="10" height="11" viewBox="0 0 10 11" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-2.5 h-2.5">
                                    <path d="M7.70833 6.95834V2.79167H3.54167M2.5 8L7.5 3.00001"
                                        stroke="currentColor" stroke-linecap="square" />
                                </svg>
                            </a>
                        </span>
                    </li>
                </ul>

                <ul class="flex gap-3 text-sm leading-normal">
                    <li>
                        <a href="{{ route('products') }}"
                            class="inline-block dark:bg-[#eeeeec] dark:border-[#eeeeec] dark:text-[#1C1C1A] dark:hover:bg-white dark:hover:border-white hover:bg-black hover:border-black px-5 py-1.5 bg-[#1b1b18] rounded-sm border border-black text-white text-sm leading-normal">
                            Belanja Sekarang
                        </a>
                    </li>
                </ul>
            </div>
            <div
                class="bg-[#fff2f2] dark:bg-[#1D0002] relative lg:-ms-px -mb-px lg:mb-0 rounded-t-lg lg:rounded-t-none lg:rounded-e-lg! aspect-[335/376] lg:aspect-auto w-full lg:w-[438px] shrink-0 overflow-hidden">

                {{-- Shoe Store Logo/Branding --}}
                <div class="w-full h-full flex items-center justify-center">
                    <div class="text-center">
                        <h2 class="text-4xl font-bold text-[#F53003] dark:text-[#F61500] mb-4">
                            👟 ShoesStore
                        </h2>
                        <p class="text-lg text-[#706f6c] dark:text-[#A1A09A]">
                            Kualitas Terbaik<br>
                            Harga Terjangkau
                        </p>
                    </div>
                </div>

                <div
                    class="absolute inset-0 rounded-t-lg lg:rounded-t-none lg:rounded-e-lg shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]">
                </div>
            </div>
        </main>
    </div>

    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif

    @livewireScripts
    @fluxScripts
</body>

</html>
