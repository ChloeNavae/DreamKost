<x-layout>
    <div class="max-w-2xl mx-auto px-4 py-8">
        <form action="{{ route('transcation.post') }}" enctype="multipart/form-data" method="POST" 
              class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-100 dark:border-gray-700">
            @csrf
            
            <!-- Header Card -->
            <div class="bg-blue-600 px-6 py-6 text-center">
                <h1 class="text-2xl font-bold tracking-tight text-white">Form Pembayaran Sewa</h1>
                <p class="text-blue-100 text-sm mt-1">Selesaikan pembayaran untuk mengamankan kamar Anda.</p>
            </div>

            <div class="p-6 sm:p-8 space-y-6">
                <!-- Info Nomor Kamar -->
                <div>
                    <label for="no_kamar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Kamar</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
                            </svg>
                        </div>
                        <input type="number" name="no_kamar" id="no_kamar" readonly value="{{ $kamar->no_kamar }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-lg font-bold rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 cursor-not-allowed">
                    </div>
                </div>

                <!-- Input Durasi & Total Harga -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="duration" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Durasi Sewa (Bulan)</label>
                        <div class="relative">
                            <input type="number" name="duration" id="duration" min="1" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Contoh: 1" oninput="calculateTotal()" />
                            <div class="absolute inset-y-0 end-0 flex items-center pe-3 pointer-events-none text-gray-500 dark:text-gray-400 text-sm">
                                Bulan
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Pembayaran</label>
                        <div class="p-2.5 bg-blue-50 dark:bg-gray-900 border border-blue-200 dark:border-gray-600 rounded-lg text-center h-[42px] flex items-center justify-center">
                            <span id="displayArea" class="font-bold text-blue-700 dark:text-blue-400 text-lg">Rp 0</span>
                        </div>
                        <!-- Hidden input to store total if needed by backend -->
                        <input type="hidden" name="total_harga" id="total_harga" value="0">
                    </div>
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
                            <p class="text-sm text-yellow-700 dark:text-yellow-500">
                                Silakan transfer ke rekening <strong>BCA 1234567890 a.n Dream Kost</strong> sebesar nominal di atas.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Upload Bukti -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Upload Bukti Transaksi</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" 
                           aria-describedby="file_input_help" id="image" name="image" type="file" required accept="image/*">
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400" id="file_input_help">PNG, JPG atau JPEG (Maks. 2MB).</p>
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="ktp">Upload Foto KTP/Tanda Pengenal</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" 
                           aria-describedby="file_input_help" id="ktp" name="ktp" type="file" required accept="image/*">
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400" id="file_input_help">Upload foto KTP/tanda pengenal yang jelas untuk verifikasi identitas.<br> PNG, JPG atau JPEG (Maks. 2MB).</p>
                </div>

                <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700">

                <!-- Tombol Aksi -->
                <div class="flex flex-col-reverse sm:flex-row justify-between gap-3">
                    <a href="/sewa" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 w-full sm:w-auto">
                        Batalkan
                    </a>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full sm:w-auto">
                        Kirim Pembayaran
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Script Kalkulasi Otomatis -->
    <script>
        function calculateTotal() {
            const hargaPerBulan = 700000; // Harga sewa per bulan
            const durationInput = document.getElementById('duration').value;
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
</x-layout>