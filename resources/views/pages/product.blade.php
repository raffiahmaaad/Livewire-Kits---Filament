@extends('layouts.app', ['title' => 'Koleksi Sepatu - ShoesStore'])

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
    <!-- Hero Section -->
    <div class="relative overflow-hidden bg-white dark:bg-gray-900 shadow-sm">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600/10 to-purple-600/10"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold text-gray-900 dark:text-white mb-4">
                    Koleksi <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">Premium</span>
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Temukan sepatu berkualitas tinggi dari brand terpercaya untuk gaya hidup aktif Anda
                </p>
            </div>
        </div>
    </div>

    <!-- Products Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        @if($products->count() > 0)
            <!-- Filter & Sort Section -->
            <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700 dark:text-gray-300 font-medium">{{ $products->count() }} Produk Tersedia</span>
                </div>
                <div class="flex items-center space-x-4">
                    <select class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option>Urutkan berdasarkan</option>
                        <option>Harga: Rendah ke Tinggi</option>
                        <option>Harga: Tinggi ke Rendah</option>
                        <option>Nama A-Z</option>
                        <option>Terbaru</option>
                    </select>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($products as $product)
                    <div class="group bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-200 dark:border-gray-700">
                        <!-- Product Image -->
                        <div class="relative overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-600 aspect-square">
                            @if($product->thumbnail)
                                <img src="{{ Storage::url($product->thumbnail) }}"
                                     alt="{{ $product->name }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg class="w-24 h-24 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif

                            <!-- Featured Badge -->
                            @if($product->is_featured)
                                <div class="absolute top-4 left-4">
                                    <span class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-3 py-1 rounded-full text-xs font-semibold shadow-lg">
                                        ⭐ Featured
                                    </span>
                                </div>
                            @endif

                            <!-- Quick Actions -->
                            <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <button class="bg-white dark:bg-gray-800 p-2 rounded-full shadow-lg hover:shadow-xl transition-shadow duration-200">
                                    <svg class="w-5 h-5 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Product Info -->
                        <div class="p-6">
                            <!-- Brand & Category -->
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-medium text-blue-600 dark:text-blue-400">
                                    {{ $product->brand->name ?? 'Brand' }}
                                </span>
                                <span class="text-xs text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded-full">
                                    {{ $product->category->name ?? 'Category' }}
                                </span>
                            </div>

                            <!-- Product Name -->
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-200">
                                {{ $product->name }}
                            </h3>

                            <!-- Description -->
                            @if($product->description)
                                <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 line-clamp-2">
                                    {{ Str::limit($product->description, 100) }}
                                </p>
                            @endif

                            <!-- Price & Action -->
                            <div class="flex items-center justify-between">
                                <div class="flex flex-col">
                                    <span class="text-2xl font-bold text-gray-900 dark:text-white">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </span>
                                </div>

                                <a href="{{ route('products.show', $product->slug) }}"
                                   class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-6 py-2 rounded-full font-semibold transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Load More Button -->
            <div class="text-center mt-12">
                <button class="bg-white dark:bg-gray-800 border-2 border-gray-300 dark:border-gray-600 hover:border-blue-500 dark:hover:border-blue-400 text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 px-8 py-3 rounded-full font-semibold transition-all duration-200 shadow-lg hover:shadow-xl">
                    Muat Lebih Banyak
                </button>
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-16">
                <div class="max-w-md mx-auto">
                    <div class="mb-8">
                        <svg class="w-24 h-24 text-gray-400 dark:text-gray-500 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                        Belum Ada Produk
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-8">
                        Produk sedang dalam proses penambahan. Silakan kembali lagi nanti.
                    </p>
                    <a href="{{ route('home') }}"
                       class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-8 py-3 rounded-full font-semibold transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        @endif
    </div>

    <!-- Newsletter Section -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 py-16">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-white mb-4">
                Dapatkan Update Produk Terbaru
            </h2>
            <p class="text-blue-100 mb-8 text-lg">
                Berlangganan newsletter kami untuk mendapatkan informasi produk terbaru dan penawaran eksklusif
            </p>
            <div class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                <input type="email"
                       placeholder="Masukkan email Anda"
                       class="flex-1 px-4 py-3 rounded-full border-0 focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-600">
                <button class="bg-white text-blue-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition-colors duration-200 shadow-lg">
                    Berlangganan
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
