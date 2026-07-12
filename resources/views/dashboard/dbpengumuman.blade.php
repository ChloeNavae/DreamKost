<x-dashboard-lay>

    <div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-3">

        {{-- ================= FORM BUAT PENGUMUMAN ================= --}}
        <div class="p-4 border rounded-lg shadow-sm border-gray-700 sm:p-6 bg-gray-800 xl:col-span-1">
            <h3 class="mb-4 text-lg font-semibold text-white">Buat Pengumuman Baru</h3>

            @session('success')
                <div class="mb-4 p-3 text-sm text-green-200 bg-green-900 rounded-lg">{{ $value }}</div>
            @endsession

            <form action="{{ route('pengumuman.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="judul" class="block mb-1 text-sm text-gray-300">Judul</label>
                    <input type="text" name="judul" id="judul" required
                        class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 text-white placeholder-gray-400"
                        placeholder="Misal: Perbaikan air minggu ini">
                    @error('judul')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="isi" class="block mb-1 text-sm text-gray-300">Isi Pengumuman</label>
                    <textarea name="isi" id="isi" rows="5" required
                        class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 text-white placeholder-gray-400"
                        placeholder="Tulis detail pengumuman untuk seluruh penghuni..."></textarea>
                    @error('isi')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit"
                    class="text-white font-medium rounded-lg text-sm px-5 py-2.5 bg-blue-600 hover:bg-blue-700">
                    Publikasikan
                </button>
            </form>
        </div>

        {{-- ================= DAFTAR PENGUMUMAN ================= --}}
        <div class="p-4 border rounded-lg shadow-sm border-gray-700 sm:p-6 bg-gray-800 xl:col-span-2">
            <h3 class="mb-4 text-lg font-semibold text-white">Riwayat Pengumuman</h3>

            @forelse ($pengumuman as $p)
                <div class="mb-4 p-4 rounded-lg bg-gray-700 flex justify-between items-start gap-4">
                    <div>
                        <p class="font-medium text-white">{{ $p->judul }}</p>
                        <p class="text-sm text-gray-300 mt-1">{{ $p->isi }}</p>
                        <p class="text-xs text-gray-400 mt-2">
                            Oleh {{ $p->pemilik->name ?? '-' }} &middot; {{ $p->created_at->diffForHumans() }}
                        </p>
                    </div>
                    <form action="{{ route('pengumuman.destroy', $p->id) }}" method="POST"
                        onsubmit="return confirm('Hapus pengumuman ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-400 hover:underline text-sm whitespace-nowrap">
                            Hapus
                        </button>
                    </form>
                </div>
            @empty
                <p class="text-sm text-gray-400">Belum ada pengumuman yang dibuat.</p>
            @endforelse
        </div>

    </div>

</x-dashboard-lay>