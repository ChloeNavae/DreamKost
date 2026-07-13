<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Form Edit User
    public function edit(User $user): View
    {
        return view('dashboard.edituser', [
            'user' => $user,
        ]);
    }
 
    // Simpan data yang telah di edit
    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'required|numeric',
            'is_admin' => 'required|in:0,1',
        ]);
 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->is_admin = (bool) $request->is_admin;
        $user->save();
 
        return redirect()->route('dbuser')->withSuccess('User berhasil diperbarui!');
    }
 
    // Delete User
    public function destroySelected(Request $request): RedirectResponse
    {
        $request->validate([
            'user_ids' => 'required|array|min:1',
            'user_ids.*' => 'exists:users,id',
        ], [
            'user_ids.required' => 'Pilih minimal 1 user untuk dihapus.',
        ]);

        // Cari user mana saja (dari yang dipilih) yang masih punya kamar
        $userIdsWithKamar = Kamar::whereIn('owner_id', $request->user_ids)
            ->pluck('owner_id')
            ->unique()
            ->toArray();

        $idsToDelete = array_diff($request->user_ids, $userIdsWithKamar);

        if (! empty($idsToDelete)) {
            User::whereIn('id', $idsToDelete)->delete();
        }

        // Kalau ada user yang dilewati karena masih punya kamar, berikan list di notif
        if (! empty($userIdsWithKamar)) {
            $namaTerlewat = User::whereIn('id', $userIdsWithKamar)->pluck('name')->join(', ');

            return back()->withError(
                "Sebagian user tidak bisa dihapus karena masih memiliki kamar aktif: {$namaTerlewat}. Kosongkan/pindahkan kamar mereka dulu sebelum menghapus."
            );
        }

        return back()->withSuccess('User terpilih berhasil dihapus!');
    }
}
