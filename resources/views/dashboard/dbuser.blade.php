<x-dashboard-lay>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div
            class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4  bg-gray-900">
            <div>
                <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                    class="inline-flex items-center   border  focus:outline-none  focus:ring-4  font-medium rounded-lg text-sm px-3 py-1.5 bg-gray-800 text-gray-400 border-gray-600 hover:bg-gray-700 hover:border-gray-600 focus:ring-gray-700"
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
                            <a href="#"
                                class="block px-4 py-2 text-sm   hover:bg-gray-600 text-gray-200 hover:text-white">Delete
                                User</a>
                        </li>
                    </ul>
                </div>
            </div>
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4  text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" id="table-search-users"
                    class="block p-2 ps-10 text-sm  border  rounded-lg w-80   bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500  focus:border-blue-500"
                    placeholder="Search for users">
            </div>
        </div>
        <table class="w-full text-sm text-left rtl:text-right  text-gray-400">
            <thead class="text-xs  uppercase  bg-gray-700 text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox"
                                class="w-4 h-4    rounded  focus:ring-blue-600 ring-offset-gray-800 focus:ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
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
            <tbody>

                @foreach ($users as $users)
                    <tr class=" border-b bg-gray-800 border-gray-700 hover: hover:bg-gray-600">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-1" type="checkbox"
                                    class="w-4 h-4    rounded  focus:ring-blue-600 ring-offset-gray-800 focus:ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
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
                            <a href="#" class="font-medium  text-blue-500 hover:underline">Edit
                                user</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-dashboard-lay>
