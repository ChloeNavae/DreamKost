<x-layout>
    <h3>Kamar {{ $kamar["no_kamar"] }}</h3>
    <h4>Owner: {{ $kamar->owner_id == null ? 'Tidak ada Orang' : $kamar->owner->name}}</h4>
    <h4>Lantai: {{ $kamar['lantai'] }}</h4>
    <h4>Terisi: {{ $kamar['terisi'] ? 'Iya' : 'Tidak' }}</h4>


    <a href="/sewa" class="text-blue-500 hover:underline">&laquo; Back to List Kamar</a>
</x-layout>
