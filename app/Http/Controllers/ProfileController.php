<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Mengisi model User dengan data yang divalidasi dari request
        $user->fill($request->validated());

        // Jika ada perubahan pada alamat email, atur ulang verifikasi email
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Jika ada foto yang diunggah, simpan foto baru
        if ($request->hasFile('foto')) {
            // Mengambil file foto dari request
            $foto = $request->file('foto');

            // Menyimpan foto ke penyimpanan yang diinginkan (misalnya: storage, public, dll.)
            $fotoPath = $foto->store('profil-foto', 'public');

            // Menyimpan path foto ke kolom 'foto' pada model User
            $user->foto = $fotoPath;
        }

        // Menyimpan perubahan pada model User ke database
        $user->save();

        // Redirect ke halaman edit profil dengan pesan sukses
        return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
