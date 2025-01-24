<x-dashboard-lay>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right  text-gray-400">
            <thead class="text-xs  uppercase  bg-gray-700 text-gray-400">
                <tr>
                    <th scope="col" class="px-16 py-3">
                        <span class="sr-only">Image</span>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Owner
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
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $transaksi)
                    <tr class="border-b bg-gray-800 border-gray-700 hover:bg-gray-600">
                        <td class="p-4">
                            <img src="{{ asset($transaksi->image) }}" class="w-16 md:w-32 max-w-full max-h-full"
                                alt="Bukti Transaksi">
                        </td>
                        <td class="px-6 py-4 font-semibold text-white">
                            {{ $transaksi->owner->name }}
                        </td>
                        <td class="px-6 py-4 font-semibold text-white">
                            {{ $transaksi->no_kamar }}
                        </td>
                        <td class="px-6 py-4 font-semibold  text-white">
                            {{ $transaksi->durasi }} Bulan
                        </td>
                        <td class="px-6 py-4 font-semibold  text-white">
                            Rp {{ $transaksi->durasi * 700000}}
                        </td>
                        <td class="px-6 py-4">
                            {{-- <a href="#" class="font-medium text-green-500 hover:underline">Accept</a> --}}
                            <a href="#" class="font-small px-4 text-red-500 hover:underline">Remove</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-dashboard-lay>
