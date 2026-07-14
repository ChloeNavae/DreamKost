{{-- resources/views/partials/pwa-head.blade.php --}}
{{-- Include partial ini di dalam <head> setiap layout supaya PWA (installability + push) aktif --}}

<link rel="manifest" href="/manifest.json">
<meta name="theme-color" content="#1f2937">
<link rel="apple-touch-icon" href="/img/icons/icon-192.png">

<script>
    window.VAPID_PUBLIC_KEY = "{{ config('services.webpush.public_key') }}";
</script>