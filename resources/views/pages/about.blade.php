@php use function Laravel\Folio\name; name('about'); @endphp

@extends('layouts.app', ['title' => 'Tentang Kami - Toko Sepatu Online'])

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 class="text-3xl font-bold mb-6">Tentang Kami</h1>
                <div class="prose dark:prose-invert max-w-none">
                    <p class="text-lg mb-4">
                        Selamat datang di Toko Sepatu Online, destinasi terpercaya untuk kebutuhan sepatu berkualitas tinggi.
                        Kami berkomitmen untuk menyediakan koleksi sepatu terbaik dengan harga yang terjangkau.
                    </p>
                    <h2 class="text-2xl font-semibold mt-8 mb-4">Visi Kami</h2>
                    <p class="mb-4">
                        Menjadi toko sepatu online terdepan yang memberikan pengalaman berbelanja terbaik
                        dengan produk berkualitas tinggi dan pelayanan yang memuaskan.
                    </p>
                    <h2 class="text-2xl font-semibold mt-8 mb-4">Misi Kami</h2>
                    <ul class="list-disc pl-6 mb-4">
                        <li>Menyediakan sepatu berkualitas tinggi dari brand ternama</li>
                        <li>Memberikan harga yang kompetitif dan terjangkau</li>
                        <li>Melayani pelanggan dengan profesional dan ramah</li>
                        <li>Menghadirkan pengalaman berbelanja online yang mudah dan aman</li>
                    </ul>
                    <h2 class="text-2xl font-semibold mt-8 mb-4">Mengapa Memilih Kami?</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                            <h3 class="font-semibold mb-2">✅ Kualitas Terjamin</h3>
                            <p class="text-sm">Semua produk telah melalui quality control ketat</p>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                            <h3 class="font-semibold mb-2">🚚 Pengiriman Cepat</h3>
                            <p class="text-sm">Pengiriman ke seluruh Indonesia dengan estimasi 1-3 hari</p>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                            <h3 class="font-semibold mb-2">💰 Harga Terbaik</h3>
                            <p class="text-sm">Kami menjamin harga terbaik di kelasnya</p>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                            <h3 class="font-semibold mb-2">🛡️ Garansi Resmi</h3>
                            <p class="text-sm">Semua produk bergaransi resmi dari distributor</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
