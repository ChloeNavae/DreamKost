<x-dashboard-lay>

    <div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-2">

        {{-- ================= INFO KAMAR ================= --}}
        <div class="p-4 border rounded-lg shadow-sm border-gray-700 sm:p-6 bg-gray-800">
            <h3 class="mb-4 text-lg font-semibold text-white">Info Kamar Saya</h3>

            @if ($kamar)
                <dl class="space-y-2 text-sm text-gray-300">
                    <div class="flex justify-between">
                        <dt>No. Kamar</dt>
                        <dd class="font-medium text-white">{{ $kamar->no_kamar }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt>Lantai</dt>
                        <dd class="font-medium text-white">{{ $kamar->lantai }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt>Mulai Sewa</dt>
                        <dd class="font-medium text-white">{{ $kamar->started_at }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt>Berakhir Sewa</dt>
                        <dd class="font-medium text-white">{{ $kamar->ended_at }}</dd>
                    </div>
                </dl>

                {{-- Countdown jatuh tempo --}}
                <div class="mt-4 p-3 rounded-lg
                    {{ $daysUntilDue !== null && $daysUntilDue < 0 ? 'bg-red-900 text-red-200' : ($showDueReminder ? 'bg-yellow-900 text-yellow-200' : 'bg-gray-700 text-gray-300') }}">
                    @if ($daysUntilDue === null)
                        Tanggal berakhir sewa belum diatur.
                    @elseif ($daysUntilDue < 0)
                        Sewa kamu sudah <strong>lewat jatuh tempo {{ abs($daysUntilDue) }} hari</strong>. Segera perpanjang sewa.
                    @else
                        Sewa akan berakhir dalam <strong>{{ $daysUntilDue }} hari</strong>.
                    @endif
                </div>

                {{-- Form Perpanjang Sewa --}}
                <form action="{{ route('sewa.perpanjang') }}" method="POST" class="mt-4 flex items-end gap-2">
                    @csrf
                    @method('PUT')
                    <div class="flex-1">
                        <label for="bulan" class="block mb-1 text-sm text-gray-300">Perpanjang (bulan)</label>
                        <select name="bulan" id="bulan"
                            class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 text-white">
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}">{{ $i }} bulan</option>
                            @endfor
                        </select>
                    </div>
                    <button type="submit"
                        class="text-white font-medium rounded-lg text-sm px-5 py-2.5 bg-blue-600 hover:bg-blue-700">
                        Perpanjang Sewa
                    </button>
                </form>
            @else
                <p class="text-sm text-gray-400">Kamu belum menyewa kamar manapun.</p>
            @endif
        </div>

        {{-- ================= PENGUMUMAN ================= --}}
        <div class="p-4 border rounded-lg shadow-sm border-gray-700 sm:p-6 bg-gray-800">
            <h3 class="mb-4 text-lg font-semibold text-white">Pengumuman</h3>

            @forelse ($pengumuman as $p)
                <div class="mb-3 pb-3 border-b border-gray-700 last:border-0 last:mb-0 last:pb-0">
                    <p class="font-medium text-white">{{ $p->judul }}</p>
                    <p class="text-sm text-gray-400">{{ $p->isi }}</p>
                    <p class="text-xs text-gray-500 mt-1">{{ $p->created_at->diffForHumans() }}</p>
                </div>
            @empty
                <p class="text-sm text-gray-400">Belum ada pengumuman dari pemilik kos.</p>
            @endforelse
        </div>

        {{-- ================= RIWAYAT TRANSAKSI ================= --}}
        <div class="p-4 border rounded-lg shadow-sm border-gray-700 sm:p-6 bg-gray-800 xl:col-span-2">
            <h3 class="mb-4 text-lg font-semibold text-white">Riwayat Transaksi</h3>

            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-400">
                    <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                        <tr>
                            <th class="px-6 py-3">Tanggal</th>
                            <th class="px-6 py-3">No. Kamar</th>
                            <th class="px-6 py-3">Durasi</th>
                            <th class="px-6 py-3">Bukti Bayar</th>
                            <th class="px-6 py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($riwayatTransaksi as $t)
                            <tr class="border-b bg-gray-800 border-gray-700">
                                <td class="px-6 py-4">{{ $t->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4">{{ $t->no_kamar }}</td>
                                <td class="px-6 py-4">{{ $t->durasi }} bulan</td>
                                <td class="px-6 py-4">
                                    <a href="{{ asset('storage/' . $t->image) }}" target="_blank" class="text-blue-400 hover:underline">Lihat</a>
                                </td>
                                <td class="px-6 py-4 capitalize
                                    {{ $t->status === 'accepted' ? 'text-green-500' : ($t->status === 'declined' ? 'text-red-500' : 'text-yellow-500') }}">
                                    {{ $t->status }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center">Belum ada riwayat transaksi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- ================= FORM KOMPLAIN ================= --}}
        <div class="p-4 border rounded-lg shadow-sm border-gray-700 sm:p-6 bg-gray-800 xl:col-span-2">
            <h3 class="mb-4 text-lg font-semibold text-white">Ajukan Komplain</h3>

            <form action="{{ route('komplain.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="judul" class="block mb-1 text-sm text-gray-300">Judul</label>
                    <input type="text" name="judul" id="judul" required
                        class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 text-white placeholder-gray-400"
                        placeholder="Misal: AC kamar rusak">
                    @error('judul')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="isi" class="block mb-1 text-sm text-gray-300">Detail Keluhan</label>
                    <textarea name="isi" id="isi" rows="4" required
                        class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 text-white placeholder-gray-400"
                        placeholder="Jelaskan keluhan kamu secara detail..."></textarea>
                    @error('isi')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit"
                    class="text-white font-medium rounded-lg text-sm px-5 py-2.5 bg-blue-600 hover:bg-blue-700">
                    Kirim Komplain
                </button>
            </form>
        </div>

    </div>

    {{-- Container fixed untuk Pop Up melayang di pojok kanan atas --}}
    <div class="fixed top-5 right-5 z-50 flex flex-col gap-3">
        
        {{-- Pop Up Berhasil (Success) --}}
        @session('success')
            <div id="toast-success" class="flex items-center w-full max-w-xs p-4 text-gray-400 bg-gray-800 border border-gray-700 rounded-lg shadow-lg" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-200 bg-green-900 rounded-lg">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ms-3 text-sm font-medium">{{ $value }}</div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-gray-800 text-gray-400 hover:text-white rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-700 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
        @endsession

        {{-- Pop Up Gagal (Error) --}}
        @session('error')
            <div id="toast-danger" class="flex items-center w-full max-w-xs p-4 text-gray-400 bg-gray-800 border border-gray-700 rounded-lg shadow-lg" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-200 bg-red-900 rounded-lg">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                    </svg>
                    <span class="sr-only">Error icon</span>
                </div>
                <div class="ms-3 text-sm font-medium">{{ $value }}</div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-gray-800 text-gray-400 hover:text-white rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-700 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-danger" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
        @endsession
    </div>
    
</x-dashboard-lay>