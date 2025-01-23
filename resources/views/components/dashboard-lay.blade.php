<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="https://www.creative-tim.com/twcomponents/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="https://www.creative-tim.com/twcomponents/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="https://www.creative-tim.com/twcomponents/favicon-16x16.png">
    <link rel="manifest" href="https://www.creative-tim.com/twcomponents/site.webmanifest">
    <link rel="mask-icon" href="https://www.creative-tim.com/twcomponents/safari-pinned-tab.svg" color="#0ed3cf">
    <meta name="msapplication-TileColor" content="#0ed3cf">
    <meta name="theme-color" content="#0ed3cf">

    <meta property="og:image"
        content="https://tailwindcomponents.com/storage/9853/conversions/temp96541-ogimage.jpg?v=2025-01-23 08:31:55" />
    <meta property="og:image:width" content="1280" />
    <meta property="og:image:height" content="640" />
    <meta property="og:image:type" content="image/png" />

    <meta property="og:url" content="https://www.creative-tim.com/twcomponents/component/dashboard-template/landing" />
    <meta property="og:title" content="Dashboard Template by khatabwedaa" />
    <meta property="og:description"
        content="Start template for dashboard projects build with Tailwindcss, Alpinejs and Laravel blade. Grab the source code at https://github.com/tailwindcomponents/dashboard-template and the live demo at https://dashboard-tailwindcomponents.netlify.app/" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@TwComponents" />
    <meta name="twitter:title" content="Dashboard Template by khatabwedaa" />
    <meta name="twitter:description"
        content="Start template for dashboard projects build with Tailwindcss, Alpinejs and Laravel blade. Grab the source code at https://github.com/tailwindcomponents/dashboard-template and the live demo at https://dashboard-tailwindcomponents.netlify.app/" />
    <meta name="twitter:image"
        content="https://tailwindcomponents.com/storage/9853/conversions/temp96541-ogimage.jpg?v=2025-01-23 08:31:55" />

    <link rel="canonical" href="https://www.creative-tim.com/twcomponents/component/dashboard-template" itemprop="URL">

    <title>Dashboard Template by khatabwedaa. </title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-200">

    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
        
        <x-dashboard-navbar></x-dashboard-navbar>

        {{ $slot }}

    </div>
    
    <script data-cfasync="false"
        src="https://www.creative-tim.com/twcomponents/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js">
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
        integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
        data-cf-beacon='{"rayId":"906671adcd319c2c","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"version":"2025.1.0","token":"1b7cbb72744b40c580f8633c6b62637e"}'
        crossorigin="anonymous"></script>
</body>

</html>
