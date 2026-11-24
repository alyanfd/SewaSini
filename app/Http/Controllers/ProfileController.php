<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    // Menampilkan halaman Edit Profil
    public function edit()
    {
        $user = Auth::user();

        abort_unless($user->jenis_akun === 'pemilik', 403);

        return view('edit-profile', compact('user'));
    }

    // Menyimpan perubahan profil
    public function update(Request $request)
    {
        $user = Auth::user();

        abort_unless($user->jenis_akun === 'pemilik', 403);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'phone' => 'required|string|max:20',
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan akun lain.',
            'phone.required' => 'Nomor telepon wajib diisi.',
        ]);

        // Jika pengguna ingin mengganti password
        if ($request->filled('password')) {
            $request->validate([
                'current_password' => 'required|string',
                'password' => 'required|string|min:8|confirmed',
            ], [
                'current_password.required' => 'Password lama wajib diisi.',
                'password.min' => 'Password baru minimal 8 karakter.',
                'password.confirmed' => 'Konfirmasi password baru tidak cocok.',
            ]);

            if (!Hash::check($request->current_password, $user->password)) {
                return back()
                    ->withErrors([
                        'current_password' => 'Password lama yang kamu masukkan salah.',
                    ])
                    ->withInput($request->only('name', 'email', 'phone'));
            }

            $validated['password'] = $request->password;
        }

        // Simpan perubahan ke database
        $user->update($validated);

        return redirect()
            ->route('profile.edit')
            ->with('success', 'Profil berhasil diperbarui!');
    }
}
