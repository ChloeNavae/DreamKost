<?php

namespace App\Http\Controllers;

use App\Models\PushSubscription;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PushSubscriptionController extends Controller
{
    /**
     * Simpan (atau update) subscription push dari browser user yang sedang login.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'endpoint' => 'required|string',
            'keys.p256dh' => 'required|string',
            'keys.auth' => 'required|string',
        ]);
 
        PushSubscription::updateOrCreate(
            ['endpoint' => $request->endpoint],
            [
                'owner_id' => Auth::id(),
                'public_key' => $request->input('keys.p256dh'),
                'auth_token' => $request->input('keys.auth'),
            ]
        );
 
        return response()->json(['message' => 'Subscribed']);
    }
}
