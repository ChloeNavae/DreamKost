// Service Worker minimal untuk DreamKost.
// SENGAJA tidak melakukan caching/offline support — fokus hanya installability
// (butuh SW terdaftar) dan push notification.

self.addEventListener('install', (event) => {
    // Langsung aktif tanpa menunggu tab lama ditutup
    self.skipWaiting();
});

self.addEventListener('activate', (event) => {
    event.waitUntil(self.clients.claim());
});

// Terima push dari server, tampilkan sebagai notifikasi sistem
self.addEventListener('push', (event) => {
    let data = {};
    try {
        data = event.data ? event.data.json() : {};
    } catch (e) {
        data = { title: 'DreamKost', body: event.data ? event.data.text() : '' };
    }

    const title = data.title || 'DreamKost';
    const options = {
        body: data.body || '',
        icon: data.icon || '/img/icons/icon-192.png',
        badge: '/img/icons/icon-192.png',
        data: {
            url: data.url || '/', // halaman yang dibuka saat notifikasi diklik
        },
    };

    event.waitUntil(self.registration.showNotification(title, options));
});

// Saat notifikasi diklik, buka/fokuskan tab ke url terkait
self.addEventListener('notificationclick', (event) => {
    event.notification.close();

    const targetUrl = event.notification.data && event.notification.data.url
        ? event.notification.data.url
        : '/';

    event.waitUntil(
        self.clients.matchAll({ type: 'window', includeUncontrolled: true }).then((clientsArr) => {
            const existingClient = clientsArr.find((c) => c.url.includes(targetUrl));
            if (existingClient) {
                return existingClient.focus();
            }
            return self.clients.openWindow(targetUrl);
        })
    );
});