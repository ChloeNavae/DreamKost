<?php

namespace App\Services;

use App\Models\PushSubscription;
use Minishlink\WebPush\Subscription;
use Minishlink\WebPush\WebPush;

class PushNotificationService
{
    protected WebPush $webPush;

    public function __construct()
    {
        $this->webPush = new WebPush([
            'VAPID' => [
                'subject' => config('app.url'),
                'publicKey' => config('services.webpush.public_key'),
                'privateKey' => config('services.webpush.private_key'),
            ],
        ]);
    }

    /**
     * Kirim notifikasi ke SEMUA subscriber (misal untuk broadcast pengumuman).
     */
    public function sendToAll(string $title, string $body, string $url = '/'): void
    {
        $this->sendToSubscriptions(PushSubscription::all(), $title, $body, $url);
    }

    /**
     * Kirim notifikasi ke satu user tertentu (misal notifikasi transaksi disetujui).
     */
    public function sendToUser(int $userId, string $title, string $body, string $url = '/'): void
    {
        $subscriptions = PushSubscription::where('user_id', $userId)->get();
        $this->sendToSubscriptions($subscriptions, $title, $body, $url);
    }

    protected function sendToSubscriptions($subscriptions, string $title, string $body, string $url): void
    {
        $payload = json_encode([
            'title' => $title,
            'body' => $body,
            'url' => $url,
        ]);

        foreach ($subscriptions as $sub) {
            $subscription = Subscription::create([
                'endpoint' => $sub->endpoint,
                'publicKey' => $sub->public_key,
                'authToken' => $sub->auth_token,
            ]);

            $this->webPush->queueNotification($subscription, $payload);
        }

        foreach ($this->webPush->flush() as $report) {
            // Kalau subscription sudah expired/invalid (browser uninstall dsb),
            // hapus dari database supaya tidak terus gagal di pengiriman berikutnya
            if (! $report->isSuccess()) {
                PushSubscription::where('endpoint', $report->getRequest()->getUri())->delete();
            }
        }
    }
}