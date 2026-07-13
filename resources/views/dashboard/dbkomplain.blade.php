<x-dashboard-lay>

    <form id="bulk-komplain-form" action="{{ route('komplain.destroySelected') }}" method="POST">
        @csrf
        @method('DELETE')

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-gray-900">
                <div>
                    <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                        class="inline-flex items-center border  focus:outline-none focus:ring-4 font-medium rounded-lg text-sm px-3 py-1.5 bg-gray-800 text-gray-400 border-gray-600 hover:bg-gray-700 hover:border-gray-600 focus:ring-gray-700"
                        type="button">
                        <span class="sr-only">Action button</span>
                        Action
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownAction"
                        class="z-10 hidden  divide-y  rounded-lg shadow w-44 bg-gray-700 divide-gray-600">
                        <ul class="py-1 text-sm  text-gray-200" aria-labelledby="dropdownActionButton">
                            <li>
                                <button type="button" onclick="confirmDeleteKomplain()" class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-600 text-gray-200 hover:text-white">
                                    Delete Komplain
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <table class="w-full text-sm text-left text-gray-400">
                <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all-search" type="checkbox" onclick="toggleAllKomplainCheckboxes(this)" class="w-4 h-4 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">Penghuni</th>
                        <th scope="col" class="px-6 py-3">Judul</th>
                        <th scope="col" class="px-6 py-3">Isi</th>
                        <th scope="col" class="px-6 py-3">Tanggal</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($komplain as $komplain)
                        <tr class="border-b bg-gray-800 border-gray-700 hover:bg-gray-600">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input type="checkbox" name="komplain_ids[]" value="{{ $komplain->id }}"
                                        class="komplain-checkbox w-4 h-4 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
                                    <label class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-medium whitespace-nowrap text-white">
                                {{ $komplain->penghuni->name ?? '-' }}
                            </td>
                            <td class="px-6 py-4">{{ $komplain->judul }}</td>
                            <td class="px-6 py-4 max-w-xs">{{ $komplain->isi }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $komplain->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-4">
                                <span class="capitalize
                                    {{ $komplain->status === 'selesai' ? 'text-green-500' : ($komplain->status === 'diproses' ? 'text-blue-400' : 'text-yellow-500') }}">
                                    {{ $komplain->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <select
                                    class="border text-xs rounded-lg p-1.5 bg-gray-700 border-gray-600 text-white"
                                    onchange="updateKomplainStatus({{ $komplain->id }}, this.value)">
                                    <option value="pending" {{ $komplain->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="diproses" {{ $komplain->status === 'diproses' ? 'selected' : '' }}>Diproses</option>
                                    <option value="selesai" {{ $komplain->status === 'selesai' ? 'selected' : '' }}>Selesai</option>
                                </select>
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
    </form>

    {{-- Form terpisah (hidden) khusus untuk update status per baris --}}
    <form id="status-update-form" action="" method="POST" class="hidden">
        @csrf
        @method('PUT')
        <input type="hidden" name="status" id="status-update-value">
    </form>

    <script>
        function toggleAllKomplainCheckboxes(source) {
            document.querySelectorAll('.komplain-checkbox').forEach(cb => cb.checked = source.checked);
        }

        function confirmDeleteKomplain() {
            const checked = document.querySelectorAll('.komplain-checkbox:checked');

            if (checked.length === 0) {
                alert('Pilih minimal 1 komplain dulu (centang checkbox di kolom paling kiri).');
                return;
            }

            const confirmed = confirm(`Yakin ingin menghapus ${checked.length} komplain terpilih? Tindakan ini tidak bisa dibatalkan.`);
            if (confirmed) {
                document.getElementById('bulk-komplain-form').submit();
            }
        }

        function updateKomplainStatus(komplainId, status) {
            const form = document.getElementById('status-update-form');
            form.action = `/komplain/${komplainId}/status`;
            document.getElementById('status-update-value').value = status;
            form.submit();
        }
    </script>

</x-dashboard-lay>