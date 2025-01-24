<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class TransactionController extends Controller
{
    public function storeTransaction(Request $request)
    {
        $request->validate([
            'duration' => 'required|numeric|min:1|max:12',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'no_kamar' => 'required|numeric',
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('bukti'), $imageName);
        $transaksi = new Transaksi();
        $transaksi->owner_id = Auth::id();
        $transaksi->image = 'bukti/'.$imageName;
        $transaksi->no_kamar = $request->no_kamar;
        $transaksi->durasi = $request->duration;
        $transaksi->save();
        return redirect("/")->withSuccess('Sewa Dalam Proses, Silahkan Tunggu.');

    }
}
