<x-layout>
    <h3>List Kamar Kosong</h3>
    <br>
    <div class="container-fluid relative w-2/6">
        <div class="grid grid-cols-4 gap-4">
            @foreach ($kamars as $kamars)
                <a href="/sewa/{{ $kamars['no_kamar'] }}" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded text-center {{ $kamars['terisi'] ? 'opacity-50 cursor-not-allowed' : '' }}" {{ $kamars['terisi'] ? @disable('true') : '' }} >{{ $kamars['no_kamar'] }}</a>
            @endforeach
        </div>
    </div>
    
</x-layout>
