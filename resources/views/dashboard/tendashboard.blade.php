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
                <form action="{{ route('sewa.perpanjang') }}" method="POST" enctype="multipart/form-data" class="mt-4 space-y-3">
                    @csrf
                    <div>
                        <label for="bulan" class="block mb-1 text-sm text-gray-300">Perpanjang (bulan)</label>
                        <select name="bulan" id="bulan"
                            class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 text-white" oninput="calculateTotal()">
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}">{{ $i }} bulan</option>
                            @endfor
                        </select>
                    </div>
                    <!-- Info Rekening (Opsional tapi disarankan) -->
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-r-lg dark:bg-gray-900 dark:border-yellow-600">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-xs text-yellow-700 dark:text-yellow-500">
                                    Silakan transfer ke rekening <strong>BCA 1234567890 a.n Dream Kost</strong> sebesar <span id="displayArea" class="font-bold">Rp 0</span>
                                </p>
                            </div>
                            <!-- Hidden input to store total if needed by backend -->
                            <input type="hidden" name="total_harga" id="total_harga" value="0">
                        </div>
                    </div>
                    <div>
                        <label for="image" class="block mb-1 text-sm text-gray-300">Bukti Transfer</label>
                        <input type="file" name="image" id="image" accept="image/png, image/jpeg, image/jpg" required
                            class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 text-white file:mr-3 file:py-1 file:px-2 file:rounded file:border-0 file:bg-blue-600 file:text-white">
                        @error('image')
                            <span class="text-sm text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit"
                        class="text-white font-medium rounded-lg text-sm px-5 py-2.5 bg-blue-600 hover:bg-blue-700">
                        Ajukan Perpanjangan Sewa
                    </button>
                    <p class="text-xs text-gray-400">Perpanjangan baru berlaku setelah disetujui pemilik kos.</p>
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
                            <th class="px-6 py-3">Jenis</th>
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
                                <td class="px-6 py-4 capitalize">{{ $t->jenis }}</td>
                                <td class="px-6 py-4">{{ $t->no_kamar }}</td>
                                <td class="px-6 py-4">{{ $t->durasi }} bulan</td>
                                <td class="px-6 py-4">
                                    <a href="{{ asset('/' . $t->image) }}" target="_blank" class="text-blue-400 hover:underline">Lihat</a>
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
    
    <!-- Script Kalkulasi Otomatis -->
    <script>
        function calculateTotal() {
            const hargaPerBulan = 700000; // Harga sewa per bulan
            const durationInput = document.getElementById('bulan').value;
            const displayArea = document.getElementById('displayArea');
            const totalHargaInput = document.getElementById('total_harga');

            if (durationInput && durationInput > 0) {
                const total = parseInt(durationInput) * hargaPerBulan;
                // Format ke Rupiah
                const formattedResult = new Intl.NumberFormat('id-ID').format(total);
                
                displayArea.textContent = `Rp ${formattedResult}`;
                totalHargaInput.value = total; // Simpan nilai murni (angka) ke input hidden jika diperlukan backend
            } else {
                displayArea.textContent = "Rp 0";
                totalHargaInput.value = 0;
            }
        }
    </script>

</x-dashboard-lay>