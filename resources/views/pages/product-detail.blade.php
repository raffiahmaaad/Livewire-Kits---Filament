@extends('layouts.app', ['title' => $product->name . ' - ShoesStore'])

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
    <!-- Breadcrumb -->
    <div class="bg-white dark:bg-gray-900 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <nav class="flex items-center space-x-2 text-sm">
                <a href="{{ route('home') }}" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                    Beranda
                </a>
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <a href="{{ route('products') }}" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                    Produk
                </a>
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-gray-900 dark:text-white font-medium">{{ $product->name }}</span>
            </nav>
        </div>
    </div>

    <!-- Product Detail -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Product Image -->
            <div class="space-y-4">
                <div class="aspect-square bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-600 rounded-2xl overflow-hidden shadow-lg">
                    @if($product->thumbnail)
                        <img src="{{ Storage::url($product->thumbnail) }}"
                             alt="{{ $product->name }}"
                             class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <svg class="w-32 h-32 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Product Info -->
            <div class="space-y-6">
                <!-- Brand & Category -->
                <div class="flex items-center space-x-4">
                    <span class="bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 px-3 py-1 rounded-full text-sm font-medium">
                        {{ $product->brand->name ?? 'Brand' }}
                    </span>
                    <span class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-3 py-1 rounded-full text-sm">
                        {{ $product->category->name ?? 'Category' }}
                    </span>
                    @if($product->is_featured)
                        <span class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            ⭐ Featured
                        </span>
                    @endif
                </div>

                <!-- Product Name -->
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white">
                    {{ $product->name }}
                </h1>

                <!-- Price -->
                <div class="flex items-center space-x-4">
                    <span class="text-4xl font-bold text-gray-900 dark:text-white">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </span>
                    @if($product->original_price && $product->original_price > $product->price)
                        <span class="text-xl text-gray-500 dark:text-gray-400 line-through">
                            Rp {{ number_format($product->original_price, 0, ',', '.') }}
                        </span>
                        <span class="bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200 px-2 py-1 rounded text-sm font-medium">
                            Hemat {{ number_format((($product->original_price - $product->price) / $product->original_price) * 100, 0) }}%
                        </span>
                    @endif
                </div>

                <!-- Description -->
                @if($product->description)
                    <div class="prose dark:prose-invert max-w-none">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Deskripsi Produk</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            {{ $product->description }}
                        </p>
                    </div>
                @endif

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <button class="flex-1 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-8 py-4 rounded-xl font-semibold text-lg transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        <svg class="w-6 h-6 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01" />
                        </svg>
                        Tambah ke Keranjang
                    </button>
                    <button class="bg-white dark:bg-gray-800 border-2 border-gray-300 dark:border-gray-600 hover:border-red-500 dark:hover:border-red-400 text-gray-700 dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400 px-6 py-4 rounded-xl font-semibold transition-all duration-200 shadow-lg hover:shadow-xl">
                        <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </button>
                </div>

                <!-- Product Features -->
                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Informasi Produk</h3>
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-600 dark:text-gray-300">Kualitas Premium</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-600 dark:text-gray-300">Garansi Resmi</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-600 dark:text-gray-300">Gratis Ongkir</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-600 dark:text-gray-300">Return 30 Hari</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        @if($relatedProducts->count() > 0)
            <div class="mt-20">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8 text-center">
                    Produk Serupa
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($relatedProducts as $relatedProduct)
                        <div class="group bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-200 dark:border-gray-700">
                            <!-- Product Image -->
                            <div class="relative overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-600 aspect-square">
                                @if($relatedProduct->thumbnail)
                                    <img src="{{ Storage::url($relatedProduct->thumbnail) }}"
                                         alt="{{ $relatedProduct->name }}"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg class="w-16 h-16 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            <!-- Product Info -->
                            <div class="p-4">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-medium text-blue-600 dark:text-blue-400">
                                        {{ $relatedProduct->brand->name ?? 'Brand' }}
                                    </span>
                                    <span class="text-xs text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded-full">
                                        {{ $relatedProduct->category->name ?? 'Category' }}
                                    </span>
                                </div>

                                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-200">
                                    {{ $relatedProduct->name }}
                                </h3>

                                <div class="flex items-center justify-between">
                                    <span class="text-xl font-bold text-gray-900 dark:text-white">
                                        Rp {{ number_format($relatedProduct->price, 0, ',', '.') }}
                                    </span>
                                    <a href="{{ route('products.show', $relatedProduct->slug) }}"
                                       class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-4 py-2 rounded-full text-sm font-semibold transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                        Lihat
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
