<x-login-lay>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 bg-gray-900">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-12 p-1 w-auto" src="/img/dk.png" alt="Dream Kost">
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-white">Edit User</h2>
        </div>

        <hr class="h-px my-8 bg-gray-300 border-0 dark:bg-gray-700">

        <form action="{{ route('user.update', $user->id) }}" class="max-w-sm mx-auto" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-white">Nama</label>
                <input type="text" name="name" id="name" required
                    class="shadow-xs border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                    value="{{ old('name', $user->name) }}" />
                @error('name')
                    <span class="text-sm text-red-400">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-white">Email</label>
                <input type="email" name="email" id="email" required
                    class="shadow-xs border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                    value="{{ old('email', $user->email) }}" />
                @error('email')
                    <span class="text-sm text-red-400">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="phone" class="block mb-2 text-sm font-medium text-white">No. HP</label>
                <input type="text" name="phone" id="phone" required
                    class="shadow-xs border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                    value="{{ old('phone', $user->phone) }}" />
                @error('phone')
                    <span class="text-sm text-red-400">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="is_admin" class="block mb-2 text-sm font-medium text-white">Role</label>
                <select name="is_admin" id="is_admin"
                    class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 text-white focus:ring-blue-500 focus:border-blue-500">
                    <option value="0" {{ old('is_admin', $user->is_admin ? '1' : '0') == '0' ? 'selected' : '' }}>Penghuni</option>
                    <option value="1" {{ old('is_admin', $user->is_admin ? '1' : '0') == '1' ? 'selected' : '' }}>Admin</option>
                </select>
                @error('is_admin')
                    <span class="text-sm text-red-400">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                Update User
            </button>

            <p class="mt-6 text-center text-sm text-gray-400">
                <a href="{{ route('dbuser') }}" class="font-semibold text-indigo-400 hover:text-indigo-300">&laquo; Kembali ke daftar user</a>
            </p>
        </form>
    </div>
</x-login-lay>