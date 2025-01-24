<x-layout>
    {{-- <h3>Kamar {{ $kamar['no_kamar'] }}</h3>
    <h4>Owner: {{ $kamar->owner_id == null ? 'Tidak ada Orang' : $kamar->owner->name }}</h4>
    <h4>Lantai: {{ $kamar['lantai'] }}</h4>
    <h4>Terisi: {{ $kamar['terisi'] ? 'Iya' : 'Tidak' }}</h4>


    <a href="/sewa" class="text-blue-500 hover:underline">&laquo; Back to List Kamar</a> --}}

    <div class="flex justify-center">
        <div class="max-w-sm p-4 border rounded-lg shadow-sm sm:p-8 bg-gray-800 border-gray-700">
            <h5 class="mb-4 text-xl font-medium text-gray-400">No Kamar {{ $kamar->no_kamar }}</h5>
            <div class="flex items-baseline text-white">
                <span class="text-3xl font-semibold">Rp</span>
                <span class="text-5xl font-extrabold tracking-tight">700.000</span>
                <span class="ms-1 text-xl font-normal  text-gray-400">/month</span>
            </div>
            <ul role="list" class="space-y-5 my-7">
                <li class="flex items-center">
                    <svg class="shrink-0 w-4 h-4  text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="text-base font-normal leading-tight  text-gray-400 ms-3">Lantai
                        {{ $kamar->lantai }}</span>
                </li>
                <li class="flex">
                    <svg class="shrink-0 w-4 h-4  text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="text-base font-normal leading-tight  text-gray-400 ms-3">Luas Kamar 6x3 m2</span>
                </li>
                <li class="flex">
                    <svg class="shrink-0 w-4 h-4  text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="text-base font-normal leading-tight  text-gray-400 ms-3">Kamar Mandi Dalam</span>
                </li>
                <li class="flex">
                    <svg class="shrink-0 w-4 h-4  text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="text-base font-normal leading-tight  text-gray-400 ms-3">Tersedia Kasur, Lemari, dan
                        Kipas Angin</span>
                </li>
                <li class="flex">
                    <svg class="shrink-0 w-4 h-4  text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="text-base font-normal leading-tight  text-gray-400 ms-3">Free Listrik & Air
                        Bersih</span>
                </li>
                <li class="flex">
                    <svg class="shrink-0 w-4 h-4  text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="text-base font-normal leading-tight  text-gray-400 ms-3">Parkiran Luas dan
                        Terlindung</span>
                </li>
                <li class="flex">
                    <svg class="shrink-0 w-4 h-4  text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="text-base font-normal leading-tight  text-gray-400 ms-3">Wifi 24/7</span>
                </li>

            </ul>
            <a href="/sewa/{{ $kamar['no_kamar'] }}/pembayaran"
                class="text-white focus:ring-4 focus:outline-none bg-blue-600 hover:bg-blue-700 focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Mulai
                Sewa</a>
            <a href="/sewa"
                class="text-white focus:ring-4 focus:outline-none bg-blue-600 hover:bg-blue-700 focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 mt-4 inline-flex justify-center w-full text-center">Kembali ke List Kamar</a>
        </div>
    </div>
</x-layout>
