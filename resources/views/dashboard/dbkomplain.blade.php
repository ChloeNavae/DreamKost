<x-dashboard-lay>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">

        <table class="w-full text-sm text-left text-gray-400">
            <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Penghuni</th>
                    <th scope="col" class="px-6 py-3">Judul</th>
                    <th scope="col" class="px-6 py-3">Isi</th>
                    <th scope="col" class="px-6 py-3">Tanggal</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($komplain as $k)
                    <tr class="border-b bg-gray-800 border-gray-700 hover:bg-gray-600">
                        <td class="px-6 py-4 font-medium whitespace-nowrap text-white">
                            {{ $k->penghuni->name ?? '-' }}
                        </td>
                        <td class="px-6 py-4">{{ $k->judul }}</td>
                        <td class="px-6 py-4 max-w-xs">{{ $k->isi }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $k->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4">
                            <span class="capitalize
                                {{ $k->status === 'selesai' ? 'text-green-500' : ($k->status === 'diproses' ? 'text-blue-400' : 'text-yellow-500') }}">
                                {{ $k->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('komplain.updateStatus', $k->id) }}" method="POST" class="flex gap-2">
                                @csrf
                                @method('PUT')
                                <select name="status"
                                    class="border text-xs rounded-lg p-1.5 bg-gray-700 border-gray-600 text-white"
                                    onchange="this.form.submit()">
                                    <option value="pending" {{ $k->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="diproses" {{ $k->status === 'diproses' ? 'selected' : '' }}>Diproses</option>
                                    <option value="selesai" {{ $k->status === 'selesai' ? 'selected' : '' }}>Selesai</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center">Belum ada komplain yang masuk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-dashboard-lay>