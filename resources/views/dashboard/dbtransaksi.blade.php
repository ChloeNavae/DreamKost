<x-dashboard-lay>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right  text-gray-400">
            <thead class="text-xs  uppercase  bg-gray-700 text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Bukti Transaksi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        KTP
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Owner
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jenis
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kamar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Bulan Sewa
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $transaksi)
                    <tr class="border-b bg-gray-800 border-gray-700 hover:bg-gray-600">
                        <td class="p-4">
                            {{-- Clickable Image Pop-Up --}}
                            <img src="{{ asset($transaksi->image) }}" class="w-16 md:w-32 max-w-full max-h-full cursor-pointer hover:opacity-75 transition-opacity"
                                alt="Bukti Transaksi"
                                onclick="showModal('{{ asset($transaksi->image) }}')"> 
                        </td>
                        <td class="px-6 py-4">
                            @if ($transaksi->ktp)
                                <a href="{{ asset($transaksi->ktp) }}" target="_blank" class="text-blue-400 hover:underline">Lihat KTP</a>
                            @else
                                <span class="text-gray-500">-</span> {{-- transaksi tipe perpanjangan tidak punya KTP --}}
                            @endif
                        </td>
                        <td class="px-6 py-4 font-semibold text-white">
                            {{ $transaksi->owner->name }}
                        </td>
                        <td class="px-6 py-4 font-semibold text-white capitalize">
                            {{ $transaksi->jenis }}
                        </td>
                        <td class="px-6 py-4 font-semibold text-white">
                            {{ $transaksi->no_kamar }}
                        </td>
                        <td class="px-6 py-4 font-semibold  text-white">
                            {{ $transaksi->durasi }} Bulan
                        </td>
                        <td class="px-6 py-4 font-semibold  text-white">
                            Rp {{ number_format($transaksi->durasi * 700000, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4 font-semibold">
                            @if ($transaksi->status === 'pending')
                                <form action="{{ route('transaksi.accepted', $transaksi->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="font-medium text-green-500 hover:underline">Accept</button>
                                </form>
                                <br>
                                <form action="{{ route('transaksi.declined', $transaksi->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="font-medium text-red-500 hover:underline">Decline</button>
                                </form>
                            @else
                                <span class="{{ $transaksi->status === 'accepted' ? 'text-green-500' : 'text-red-500' }} uppercase">
                                    {{ $transaksi->status }}
                                </span>
                            @endif

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="imageModal" class="fixed inset-0 z-50 hidden bg-black/80 flex items-center justify-center p-4 backdrop-blur-sm transition-all duration-300" onclick="closeModal()">
        <span class="absolute top-5 right-8 text-white text-4xl font-bold cursor-pointer hover:text-red-500 transition-colors">&times;</span>
        <img id="modalImage" class="max-w-full max-h-screen rounded-lg shadow-2xl object-contain" src="" alt="Zoom Bukti Transaksi">
    </div>

    <script>
        function showModal(imageSrc) {
            document.getElementById('modalImage').src = imageSrc;
            document.getElementById('imageModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('imageModal').classList.add('hidden');
        }
    </script>

</x-dashboard-lay>
