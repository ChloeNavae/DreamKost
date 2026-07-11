<x-dashboard-lay>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        
        <table class="w-full text-sm text-left rtl:text-right  text-gray-400">
            <thead class="text-xs  uppercase  bg-gray-700 text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No. Kamar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Owner
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Lantai
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jatuh Tempo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kamar as $kamar)
                    <tr class="border-b bg-gray-800 border-gray-700 hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap text-white">
                            {{ $kamar->no_kamar }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $kamar->owner_id == null ? '-' : $kamar->owner->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $kamar->lantai }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $kamar->ended_at }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('kamar.edit', $kamar->no_kamar) }}" class="font-medium  text-blue-500 hover:underline">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-dashboard-lay>
