<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Dream Kos - Pontianak</title>
</head>

<body class="h-full">
    <div class="min-h-full">
        <x-navbar></x-navbar>
        <x-header></x-header>


        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}

                {{-- Container fixed untuk Pop Up melayang di pojok kanan atas --}}
                <div class="fixed top-5 right-5 z-50 flex flex-col gap-3">
                    
                    {{-- Pop Up Berhasil (Success) --}}
                    @session('success')
                        <div id="toast-success" class="flex items-center w-full max-w-xs p-4 text-gray-400 bg-gray-800 border border-gray-700 rounded-lg shadow-lg" role="alert">
                            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-200 bg-green-900 rounded-lg">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                </svg>
                                <span class="sr-only">Check icon</span>
                            </div>
                            <div class="ms-3 text-sm font-medium">{{ $value }}</div>
                            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-gray-800 text-gray-400 hover:text-white rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-700 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                        </div>
                    @endsession

                    {{-- Pop Up Gagal (Error) --}}
                    @session('error')
                        <div id="toast-danger" class="flex items-center w-full max-w-xs p-4 text-gray-400 bg-gray-800 border border-gray-700 rounded-lg shadow-lg" role="alert">
                            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-200 bg-red-900 rounded-lg">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                                </svg>
                                <span class="sr-only">Error icon</span>
                            </div>
                            <div class="ms-3 text-sm font-medium">{{ $value }}</div>
                            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-gray-800 text-gray-400 hover:text-white rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-700 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-danger" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                        </div>
                    @endsession
                </div>
                
            </div>
        </main>
    </div>
</body>

</html>
