<x-dashboard-lay>

    <form id="bulk-users-form" action="{{ route('user.destroySelected') }}" method="POST">
        @csrf
        @method('DELETE')

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4  bg-gray-900">
                <div>
                    <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction" class="inline-flex items-center   border  focus:outline-none  focus:ring-4  font-medium rounded-lg text-sm px-3 py-1.5 bg-gray-800 text-gray-400 border-gray-600 hover:bg-gray-700 hover:border-gray-600 focus:ring-gray-700" type="button">
                        <span class="sr-only">Action button</span>
                        Action
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownAction" class="z-10 hidden  divide-y  rounded-lg shadow w-44 bg-gray-700 divide-gray-600">
                        <ul class="py-1 text-sm  text-gray-200" aria-labelledby="dropdownActionButton">
                            <li>
                                <button type="button" onclick="confirmDeleteUsers()" class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-600 text-gray-200 hover:text-white">Delete User</button>
                            </li>
                        </ul>
                    </div>
                </div>
                <label class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4  text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="table-search-users" oninput="filterUsersTable()" class="block p-2 ps-10 text-sm  border  rounded-lg w-80   bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500  focus:border-blue-500" placeholder="Search for users">
                </div>
            </div>
            <table class="w-full text-sm text-left rtl:text-right  text-gray-400">
                <thead class="text-xs  uppercase  bg-gray-700 text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all-search" type="checkbox" onclick="toggleAllUserCheckboxes(this)" class="w-4 h-4 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            No HP
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Role
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody id="users-table-body">
                    @foreach ($users as $users)
                        <tr class="user-row border-b bg-gray-800 border-gray-700 hover: hover:bg-gray-600" data-name="{{ strtolower($users->name) }}">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input type="checkbox" name="user_ids[]" value="{{  $users->id }}" class="user-checkbox w-4 h-4 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
                                    <label class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row" class="flex items-center px-6 py-4  whitespace-nowrap text-white">
                                <div class="ps-3">
                                    <div class="text-base font-semibold">{{ $users->name }}</div>
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                {{ $users->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $users->phone }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    {{ $users->is_admin ? 'Admin' : 'Guess'}}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('user.edit', $users->id) }}" class="font-medium  text-blue-500 hover:underline">Edit
                                    user</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p id="no-user-result" class="hidden p-4 text-center text-gray-400">Tidak ada user yang cocok.</p>
        </div>
    </form>

    {{-- Script buat Delete User & Search User --}}
    <script>
        function toggleAllUserCheckboxes(source) {
            document.querySelectorAll('.user-checkbox').forEach(cb => {
                // hanya centang checkbox yang barisnya sedang terlihat (hasil search)
                const row = cb.closest('tr');
                if (row.style.display !== 'none') {
                    cb.checked = source.checked;
                }
            });
        }

        function confirmDeleteUsers() {
            const checked = document.querySelectorAll('.user-checkbox:checked');

            if (checked.length === 0) {
                alert('Pilih minimal 1 user dulu (centang checkbox di kolom paling kiri).');
                return;
            }

            const confirmed = confirm(`Yakin ingin menghapus ${checked.length} user terpilih? Tindakan ini tidak bisa dibatalkan.`);
            if (confirmed) {
                document.getElementById('bulk-users-form').submit();
            }
        }

        function filterUsersTable() {
            const keyword = document.getElementById('table-search-users').value.toLowerCase().trim();
            const rows = document.querySelectorAll('.user-row');
            let visibleCount = 0;

            rows.forEach(row => {
                const name = row.getAttribute('data-name');
                const match = name.includes(keyword);
                row.style.display = match ? '' : 'none';
                if (match) visibleCount++;
            });

            document.getElementById('no-user-result').classList.toggle('hidden', visibleCount > 0);
        }
    </script>

</x-dashboard-lay>
