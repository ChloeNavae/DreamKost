<x-login-lay>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 bg-gray-900">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-12 p-1 w-auto" src="/img/dk.png" alt="Dream Kost">
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-white">Edit Room</h2>
        </div>

        <hr class="h-px my-8 bg-gray-300 border-0 dark:bg-gray-700">

        <form action="{{ route('kamar.update') }}" class="max-w-sm mx-auto" method="PUT"> {{-- MASIH ERROR --}}
            @csrf
            <div class="mb-5">
                <label for="no_kamar" class="block mb-2 text-sm font-medium text-white">No Kamar</label>
                <input type="no_kamar" id="no_kamar"
                    class="shadow-xs  border  text-sm rounded-lg  block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500 shadow-xs-light" value="{{ $kamar }}"/>
            </div>
            <div class="mb-5">
                <label for="lantai" class="block mb-2 text-sm font-medium text-white">Lantai</label>
                <input type="number" id="lantai"
                    class="shadow-xs  border  text-sm rounded-lg  block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500 shadow-xs-light" value="{{ $kamar }}" required />
            </div>
            <div class="mb-5">
                <label for="owner_id" class="block mb-2 text-sm font-medium text-white">Owner</label>
                <select id="owner_id"
                    class=" border  text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Tidak Ada</option>
                    @foreach ($users as $users)
                        <option value="{{ $users->id }}">{{ $users->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-5">
                <label for="started_at" class="block mb-2 text-sm font-medium text-white">Mulai</label>
                <input type="date" id="started_at"
                    class="shadow-xs  border  text-sm rounded-lg  block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500 shadow-xs-light" value="{{ $kamar }}"/>
            </div>
            <div class="mb-5">
                <label for="ended_at" class="block mb-2 text-sm font-medium text-white">Berakhir</label>
                <input type="date" id="ended_at"
                    class="shadow-xs  border  text-sm rounded-lg  block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500 shadow-xs-light" value="{{ $kamar }}"/>
            </div>
            <button type="submit"
                class="text-white   focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Update Kamar</button>
        </form>
    </div>

</x-login-lay>
