<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'new_password' => ['required', 'string', 'min:8'], // Validasi password baru
        ]);

        $user = User::findOrFail($id); // Cari pengguna berdasarkan ID

        $user->password = bcrypt($request->new_password); // Update password pengguna dengan password baru
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully.'); // Redirect kembali dengan pesan sukses
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }



    // Fungsi-fungsi lain seperti editPassword, delete, dll. bisa ditambahkan di sini
}
