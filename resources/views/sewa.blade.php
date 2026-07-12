<x-layout>
    <div class="max-w-5xl mx-auto px-4 py-8">
        
        <!-- Bagian Header -->
        <div class="text-center mb-10">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl dark:text-white">
                Pilih Kamar Dream Kost
            </h2>
            <p class="mt-3 max-w-2xl mx-auto text-lg text-gray-500 sm:mt-4 dark:text-gray-400">
                Silakan pilih kamar yang masih tersedia pada list di bawah ini.
            </p>
        </div>

        <!-- Bagian Keterangan / Legend -->
        <div class="flex justify-center items-center gap-6 mb-8 bg-gray-50 dark:bg-gray-800 w-fit mx-auto px-6 py-3 rounded-full border border-gray-200 dark:border-gray-700">
            <div class="flex items-center gap-2">
                <span class="block w-4 h-4 bg-white border-2 border-blue-500 rounded-full dark:bg-gray-700 dark:border-blue-400"></span>
                <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">Tersedia</span>
            </div>
            <div class="flex items-center gap-2">
                <span class="block w-4 h-4 bg-gray-200 border-2 border-gray-300 rounded-full dark:bg-gray-600 dark:border-gray-500"></span>
                <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">Terisi</span>
            </div>
        </div>

        <!-- Grid Kamar -->
        {{-- Diubah menjadi grid responsif: 3 kolom di HP, 4 di Tablet, dan 6 di Desktop --}}
        <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 gap-4 sm:gap-6">
            @foreach ($kamars as $kamar)
                @if ($kamar['terisi'] == true)
                    <!-- Tampilan Kamar Terisi -->
                    <div class="flex flex-col items-center justify-center p-4 bg-gray-100 border-2 border-gray-200 rounded-xl cursor-not-allowed dark:bg-gray-800/50 dark:border-gray-700 opacity-60">
                        <svg class="w-6 h-6 mb-1 text-gray-400 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
                        </svg>
                        <span class="text-xl sm:text-2xl font-bold text-gray-400 dark:text-gray-500">{{ $kamar['no_kamar'] }}</span>
                        <span class="text-xs font-medium text-gray-400 mt-1 dark:text-gray-500">Terisi</span>
                    </div>
                @else
                    <!-- Tampilan Kamar Tersedia -->
                    <a href="/sewa/{{ $kamar['no_kamar'] }}" 
                       class="group relative flex flex-col items-center justify-center p-4 bg-white border-2 border-blue-500 rounded-xl hover:bg-blue-50 hover:border-blue-600 transition-all duration-200 shadow-sm hover:shadow-md transform hover:-translate-y-1 dark:bg-gray-800 dark:hover:bg-gray-700 dark:border-blue-400">
                        <svg class="w-6 h-6 mb-1 text-blue-500 group-hover:text-blue-600 dark:text-blue-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8v10a1 1 0 0 0 1 1h4v-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v5h4a1 1 0 0 0 1-1V8M1 10l9-9 9 9"/>
                        </svg>
                        <span class="text-xl sm:text-2xl font-bold text-blue-600 group-hover:text-blue-700 dark:text-blue-400 dark:group-hover:text-blue-300">{{ $kamar['no_kamar'] }}</span>
                        <span class="text-xs font-medium text-blue-500 mt-1 dark:text-blue-400">Tersedia</span>
                    </a>
                @endif
            @endforeach
        </div>

    </div>

</x-layout>