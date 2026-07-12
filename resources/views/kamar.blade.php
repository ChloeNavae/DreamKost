<x-layout>
    <div class="max-w-4xl mx-auto px-4 py-8">
        
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-100 dark:border-gray-700">
            
            <div class="relative h-64 sm:h-80 w-full bg-gray-200">
                <img src="/img/foto/foto.jpg" 
                     alt="Ilustrasi Kamar" class="w-full h-full object-cover">
                
                <div class="absolute top-4 right-4 bg-blue-600 text-white text-xs font-bold px-3 py-1.5 rounded-full uppercase tracking-wide shadow-md">
                    Kamar Tersedia
                </div>
            </div>

            <div class="p-6 sm:p-8">
                
                <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-6 gap-4">
                    <div>
                        <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white">Kamar {{ $kamar->no_kamar }}</h1>
                        <p class="text-gray-500 dark:text-gray-400 mt-1">Dream Kost - Pilihan Tepat, Harga Bersahabat</p>
                    </div>
                    <div class="text-left sm:text-right bg-blue-50 dark:bg-gray-900 p-4 rounded-xl border border-blue-100 dark:border-gray-700">
                        <p class="text-sm text-gray-500 dark:text-gray-400 font-medium mb-1">Harga Sewa</p>
                        <div class="flex items-baseline text-blue-700 dark:text-blue-400">
                            <span class="text-xl font-bold">Rp</span>
                            <span class="text-4xl font-extrabold tracking-tight ms-1">700.000</span>
                            <span class="text-gray-500 dark:text-gray-400 ms-1 text-sm font-medium">/bulan</span>
                        </div>
                    </div>
                </div>

                <hr class="h-px my-6 bg-gray-200 border-0 dark:bg-gray-700">

                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Fasilitas yang Anda Dapatkan:</h3>
                
                <ul role="list" class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                    <li class="flex items-center p-3 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                        <svg class="shrink-0 w-5 h-5 text-blue-600 dark:text-blue-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300 ms-3">Berada di Lantai {{ $kamar->lantai }}</span>
                    </li>
                    <li class="flex items-center p-3 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                        <svg class="shrink-0 w-5 h-5 text-blue-600 dark:text-blue-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300 ms-3">Luas Kamar 6x3 m²</span>
                    </li>
                    <li class="flex items-center p-3 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                        <svg class="shrink-0 w-5 h-5 text-blue-600 dark:text-blue-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300 ms-3">Kamar Mandi Dalam</span>
                    </li>
                    <li class="flex items-center p-3 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                        <svg class="shrink-0 w-5 h-5 text-blue-600 dark:text-blue-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300 ms-3">Kasur, Lemari & Kipas Angin</span>
                    </li>
                    <li class="flex items-center p-3 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                        <svg class="shrink-0 w-5 h-5 text-blue-600 dark:text-blue-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300 ms-3">Gratis Listrik & Air Bersih</span>
                    </li>
                    <li class="flex items-center p-3 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                        <svg class="shrink-0 w-5 h-5 text-blue-600 dark:text-blue-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300 ms-3">Parkiran Luas & Aman</span>
                    </li>
                    <li class="flex items-center p-3 bg-gray-50 dark:bg-gray-700/50 rounded-lg sm:col-span-2">
                        <svg class="shrink-0 w-5 h-5 text-blue-600 dark:text-blue-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300 ms-3">Koneksi WiFi Cepat 24/7</span>
                    </li>
                </ul>

                <div class="flex flex-col-reverse sm:flex-row gap-3 mt-8">
                    <a href="/sewa" class="flex-1 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-3 text-center inline-flex justify-center items-center gap-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                        <svg class="w-4 h-4 transform rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                        Kembali ke List Kamar
                    </a>
                    
                    <a href="/sewa/{{ $kamar->no_kamar }}/pembayaran" class="flex-1 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3 text-center inline-flex justify-center items-center gap-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Lanjut Pembayaran
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-layout>