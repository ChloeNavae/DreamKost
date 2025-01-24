<x-layout>

    <form action="{{ route('transcation.post') }}" class="max-w-md mx-auto" enctype="multipart/form-data" method="POST">
        @csrf
        <h1 class="text-3xl tracking-tight text-gray-900">Form Pembayaran</h1>
        <hr class="h-px my-8 bg-gray-300 border-0 dark:bg-gray-700">
        <div class="relative z-0 w-full mb-5 group">
            <input type="number" name="no_kamar" id="no_kamar" @readonly(true)
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder="" value="{{ $kamar->no_kamar }}"/>
            <label for="no_kamar"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">No Kamar</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="number" name="duration" id="duration"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " required />
            <label for="duration"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Durasi(Bulan).
                Contoh: 1</label>
            <button onclick="getValue()">Check</button>
        </div>

        <script> // untuk total pembayaran
            function getValue() {
                const inputValue = parseFloat(document.getElementById('duration').value);

                if (!isNaN(inputValue)) {
                    const result = inputValue * 700000;
                    const formattedResult = result.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                    document.getElementById('displayArea').textContent = `Total: Rp ${formattedResult}`;
                } else {
                    document.getElementById('displayArea').textContent = "Silahkan Masukan Jumlah Bulan";
                }
            }
        </script>
        
        <div class="relative z-0 w-full mb-5 group"> {{-- Menampilkan Total Pembayaran --}}
            <input type="text" name="total_harga" id="total_harga" @disabled(true)
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " />
            <label for="total_harga" id="displayArea"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"></label> 
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="file" name="image" id="image"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " required />
            <label for="image"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Bukti
                Transaksi</label>
        </div>


        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        <hr class="h-px my-8 bg-gray-300 border-0 dark:bg-gray-700">
        <a href="/sewa"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kembali ke List Kamar</a>
    </form>

</x-layout>
