@php use function Laravel\Folio\name; name('products'); @endphp

@extends('layouts.app', ['title' => 'Koleksi Sepatu - Toko Sepatu Online'])

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 class="text-3xl font-bold mb-6">Koleksi Sepatu</h1>
                <p class="text-lg mb-8">Temukan berbagai pilihan sepatu berkualitas untuk kebutuhan Anda.</p>
                {{-- Placeholder untuk produk sepatu --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                        <div class="h-48 bg-gray-200 dark:bg-gray-600 rounded mb-4"></div>
                        <h3 class="text-lg font-semibold mb-2">Sepatu Sneakers</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-2">Sepatu casual untuk aktivitas sehari-hari</p>
                        <p class="text-xl font-bold text-blue-600">Rp 500.000</p>
                    </div>
                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                        <div class="h-48 bg-gray-200 dark:bg-gray-600 rounded mb-4"></div>
                        <h3 class="text-lg font-semibold mb-2">Sepatu Formal</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-2">Sepatu untuk acara formal dan kerja</p>
                        <p class="text-xl font-bold text-blue-600">Rp 750.000</p>
                    </div>
                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                        <div class="h-48 bg-gray-200 dark:bg-gray-600 rounded mb-4"></div>
                        <h3 class="text-lg font-semibold mb-2">Sepatu Olahraga</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-2">Sepatu untuk aktivitas olahraga</p>
                        <p class="text-xl font-bold text-blue-600">Rp 600.000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
