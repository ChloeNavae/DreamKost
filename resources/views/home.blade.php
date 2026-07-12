<x-layout>
    <section class="bg-white dark:bg-gray-900 pb-16">
        
        <div id="default-carousel" class="relative w-full" data-carousel="slide">
            <div class="relative h-56 overflow-hidden sm:h-96 lg:h-[500px]">
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="/img/carousel/c1.jpg"
                        class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Foto Kos 1">
                </div>
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="/img/carousel/c2.jpg"
                        class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Foto Kos 2">
                </div>
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="/img/carousel/c3.jpg"
                        class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Foto Kos 3">
                </div>
            </div>
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-3 h-3 rounded-full bg-white/50 hover:bg-white" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full bg-white/50 hover:bg-white" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full bg-white/50 hover:bg-white" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            </div>
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none transition-all">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none transition-all">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>

        <div class="py-12 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                Selamat Datang di Dream Kost
            </h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">
                Pilihan hunian yang nyaman, aman, dan strategis di daerah Pontianak. Dekat dengan area Kampus IKIP dan akses mudah menuju pusat kota.
            </p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                <a href="/sewa" class="inline-flex justify-center items-center py-3 px-6 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900 transition-all shadow-lg hover:shadow-blue-500/30 transform hover:-translate-y-1">
                    Mulai Sewa Kamar
                    <svg class="w-4 h-4 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
                <a href="#fasilitas" class="inline-flex justify-center items-center py-3 px-6 text-base font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 transition-all">
                    Lihat Fasilitas
                </a>
            </div>
        </div>

        <div id="fasilitas" class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 bg-gray-50 dark:bg-gray-800/50 rounded-3xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl dark:text-white">
                    Fasilitas Unggulan Kami
                </h2>
                <p class="mt-4 text-lg text-gray-500 dark:text-gray-400">
                    Nikmati pengalaman ngekos terbaik dengan fasilitas lengkap yang menunjang aktivitas Anda.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-8 gap-6 px-4 sm:px-8">
                
                <div class="col-span-1 sm:col-span-2 md:col-span-2 lg:col-span-2 flex flex-col items-center text-center p-6 bg-white rounded-2xl shadow-sm border border-gray-100 dark:bg-gray-800 dark:border-gray-700 hover:shadow-md transition-shadow">
                    <div class="p-3 bg-blue-100 text-blue-600 rounded-full dark:bg-blue-900/30 dark:text-blue-400 mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Kamar Luas</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Kamar berukuran 6x3 m² yang lega dan nyaman untuk beristirahat.</p>
                </div>

                <div class="col-span-1 sm:col-span-2 md:col-span-2 lg:col-span-2 flex flex-col items-center text-center p-6 bg-white rounded-2xl shadow-sm border border-gray-100 dark:bg-gray-800 dark:border-gray-700 hover:shadow-md transition-shadow">
                    <div class="p-3 bg-blue-100 text-blue-600 rounded-full dark:bg-blue-900/30 dark:text-blue-400 mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Kamar Mandi Dalam</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Privasi lebih terjaga dengan kamar mandi di dalam setiap kamar.</p>
                </div>

                <div class="col-span-1 sm:col-span-2 md:col-span-2 lg:col-span-2 flex flex-col items-center text-center p-6 bg-white rounded-2xl shadow-sm border border-gray-100 dark:bg-gray-800 dark:border-gray-700 hover:shadow-md transition-shadow">
                    <div class="p-3 bg-blue-100 text-blue-600 rounded-full dark:bg-blue-900/30 dark:text-blue-400 mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Full Furnished</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Sudah tersedia kasur yang empuk, lemari pakaian, dan kipas angin.</p>
                </div>

                <div class="col-span-1 sm:col-span-2 md:col-span-2 lg:col-span-2 flex flex-col items-center text-center p-6 bg-white rounded-2xl shadow-sm border border-gray-100 dark:bg-gray-800 dark:border-gray-700 hover:shadow-md transition-shadow">
                    <div class="p-3 bg-blue-100 text-blue-600 rounded-full dark:bg-blue-900/30 dark:text-blue-400 mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Free Listrik & Air</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Biaya sewa sudah termasuk tagihan pemakaian listrik dan air bersih.</p>
                </div>

                <div class="col-span-1 sm:col-span-2 md:col-span-2 lg:col-span-2 lg:col-start-2 flex flex-col items-center text-center p-6 bg-white rounded-2xl shadow-sm border border-gray-100 dark:bg-gray-800 dark:border-gray-700 hover:shadow-md transition-shadow">
                    <div class="p-3 bg-blue-100 text-blue-600 rounded-full dark:bg-blue-900/30 dark:text-blue-400 mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Parkir Luas & Aman</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Area parkir kendaraan yang luas, terlindung, dan aman.</p>
                </div>

                <div class="col-span-1 sm:col-span-2 md:col-span-2 lg:col-span-2 flex flex-col items-center text-center p-6 bg-white rounded-2xl shadow-sm border border-gray-100 dark:bg-gray-800 dark:border-gray-700 hover:shadow-md transition-shadow">
                    <div class="p-3 bg-blue-100 text-blue-600 rounded-full dark:bg-blue-900/30 dark:text-blue-400 mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Koneksi WiFi 24/7</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Akses internet cepat tanpa henti untuk kebutuhan tugas maupun hiburan.</p>
                </div>

                <div class="col-span-1 sm:col-span-2 md:col-span-2 lg:col-span-2 sm:col-start-2 md:col-start-3 lg:col-start-auto flex flex-col items-center text-center p-6 bg-white rounded-2xl shadow-sm border border-gray-100 dark:bg-gray-800 dark:border-gray-700 hover:shadow-md transition-shadow">
                    <div class="p-3 bg-blue-100 text-blue-600 rounded-full dark:bg-blue-900/30 dark:text-blue-400 mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2v10z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Tersedia Kantin</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Tidak perlu repot mencari makan, kami menyediakan area kantin di dalam kawasan kos.</p>
                </div>

            </div>
        </div>
    </section>
</x-layout>