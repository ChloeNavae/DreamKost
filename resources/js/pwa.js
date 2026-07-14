// resources/js/pwa.js
// Import file ini di resources/js/app.js: import './pwa';

const VAPID_PUBLIC_KEY = window.VAPID_PUBLIC_KEY; // di-inject dari blade, lihat langkah berikutnya

function urlBase64ToUint8Array(base64String) {
    const padding = '='.repeat((4 - (base64String.length % 4)) % 4);
    const base64 = (base64String + padding).replace(/-/g, '+').replace(/_/g, '/');
    const rawData = window.atob(base64);
    return Uint8Array.from([...rawData].map((char) => char.charCodeAt(0)));
}

async function registerServiceWorker() {
    if (!('serviceWorker' in navigator)) {
        console.log('Service Worker tidak didukung browser ini.');
        return null;
    }

    try {
        const registration = await navigator.serviceWorker.register('/sw.js');
        console.log('Service Worker terdaftar:', registration.scope);
        return registration;
    } catch (error) {
        console.error('Gagal mendaftarkan Service Worker:', error);
        return null;
    }
}

async function subscribeToPush(registration) {
    if (!('PushManager' in window)) {
        console.log('Push notification tidak didukung browser ini.');
        return;
    }

    // Minta izin notifikasi dari user
    const permission = await Notification.requestPermission();
    if (permission !== 'granted') {
        console.log('Izin notifikasi ditolak.');
        return;
    }

    let subscription = await registration.pushManager.getSubscription();

    if (!subscription) {
        subscription = await registration.pushManager.subscribe({
            userVisibleOnly: true,
            applicationServerKey: urlBase64ToUint8Array(VAPID_PUBLIC_KEY),
        });
    }

    // Kirim subscription ke backend Laravel untuk disimpan
    await fetch('/push/subscribe', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        },
        body: JSON.stringify(subscription),
    });

    console.log('Berhasil subscribe push notification.');
}

async function initPwa() {
    const registration = await registerServiceWorker();
    if (registration) {
        await subscribeToPush(registration);
    }
}

// Jalankan hanya kalau user sudah login (elemen ini ditandai di layout dashboard)
if (document.body.dataset.authenticated === 'true') {
    initPwa();
}