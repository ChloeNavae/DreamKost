<x-layout>
    <div class="max-w-5xl mx-auto px-4 py-8">
        
        <div class="text-center mb-10">
            <h1 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl dark:text-white">
                Galeri Dream Kost
            </h1>
            <p class="mt-3 max-w-2xl mx-auto text-lg text-gray-500 sm:mt-4 dark:text-gray-400">
                Lihat lebih dekat kenyamanan kamar, fasilitas lengkap, dan lingkungan asri yang kami tawarkan.
            </p>
        </div>

        <div class="grid gap-4 sm:gap-6">
            
            <div class="relative overflow-hidden rounded-2xl shadow-md group aspect-video sm:aspect-[21/9] bg-gray-200 dark:bg-gray-800 cursor-pointer">
                <img class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-in-out group-hover:scale-105"
                    src="/img/foto/foto.jpg" alt="Suasana Utama Dream Kost">
                <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition-colors duration-500"></div>
            </div>

            {{-- Responsif: 2 kolom di layar kecil (HP), 3 kolom di layar sedang/besar --}}
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 sm:gap-6">
                <div class="relative overflow-hidden rounded-xl shadow-sm group aspect-square sm:aspect-[4/3] bg-gray-200 dark:bg-gray-800 cursor-pointer">
                    <img class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 ease-in-out group-hover:scale-110"
                        src="/img/foto/foto1.jpg" alt="Fasilitas 1">
                </div>
                
                <div class="relative overflow-hidden rounded-xl shadow-sm group aspect-square sm:aspect-[4/3] bg-gray-200 dark:bg-gray-800 cursor-pointer">
                    <img class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 ease-in-out group-hover:scale-110"
                        src="/img/foto/foto2.jpg" alt="Fasilitas 2">
                </div>
                
                {{-- Foto ketiga mengambil 2 kolom di HP agar tidak bolong, lalu 1 kolom di layar besar --}}
                <div class="relative overflow-hidden rounded-xl shadow-sm group aspect-video sm:aspect-[4/3] bg-gray-200 dark:bg-gray-800 col-span-2 sm:col-span-1 cursor-pointer">
                    <img class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 ease-in-out group-hover:scale-110"
                        src="/img/foto/foto3.jpg" alt="Fasilitas 3">
                </div>
            </div>

        </div>
    </div>
</x-layout>