<x-layout>
    <h3 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-xl lg:text-2xl dark:text-white">List Kamar Dream Kost</h3>
    <br>
    <div class="container-fluid relative w-2/6">
        <div class="grid grid-cols-4 gap-4">
            @foreach ($kamars as $kamars)
                @if ($kamars['terisi'] == true)
                    <a class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded text-center opacity-50 cursor-not-allowed">{{ $kamars['no_kamar'] }}</a>
                @else
                    <a
                        href="/sewa/{{ $kamars['no_kamar'] }}"class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded text-center">{{ $kamars['no_kamar'] }}</a>
                @endif
            @endforeach
        </div>
    </div>


</x-layout>
