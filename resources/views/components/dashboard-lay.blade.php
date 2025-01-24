<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Dream Kos - Pontianak</title>
</head>

<body class="bg-gray-900">
    <x-dashboard-sidebar></x-dashboard-sidebar>
    <main class="p-4 sm:ml-64">

        {{ $slot }}

    </main>

    <script src="./node_modules/flowbite/dist/flowbite.min.js"></script>
</body>

</html>
