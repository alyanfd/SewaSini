<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KosController extends Controller
{
    // Menampilkan halaman Kos Saya
    public function index()
    {
        $user = Auth::user();

        abort_unless($user->jenis_akun === 'pemilik', 403);

        $kos = Kos::where('user_id', $user->id)
                  ->latest()
                  ->get();

        return view('kos-saya', compact('kos'));
    }

    // Menyimpan pendaftaran kos
    public function store(Request $request)
    {
        $user = Auth::user();

        abort_unless($user->jenis_akun === 'pemilik', 403);

        $validated = $request->validate([
            'nama_kos' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'nomor_telepon' => 'required|string|max:20',
            'harga' => 'required|numeric|min:1',
            'lokasi' => 'required|string',
            'jumlah_kamar' => 'required|integer|min:1',
            'kategori' => 'required|in:campur,putra,putri',
            'foto' => 'required|array|min:1|max:6',
            'foto.*' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ], [
            'nama_kos.required' => 'Nama kos wajib diisi.',
            'deskripsi.required' => 'Deskripsi kos wajib diisi.',
            'nomor_telepon.required' => 'Nomor telepon wajib diisi.',
            'harga.required' => 'Harga sewa wajib diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'harga.min' => 'Harga harus lebih dari 0.',
            'lokasi.required' => 'Lokasi kos wajib diisi.',
            'jumlah_kamar.required' => 'Jumlah kamar wajib diisi.',
            'jumlah_kamar.integer' => 'Jumlah kamar harus berupa angka.',
            'jumlah_kamar.min' => 'Jumlah kamar minimal 1.',
            'kategori.required' => 'Silakan pilih kategori kos.',
            'foto.required' => 'Minimal unggah 1 foto kos.',
            'foto.min' => 'Minimal unggah 1 foto kos.',
            'foto.max' => 'Maksimal unggah 6 foto kos.',
            'foto.*.image' => 'File yang diunggah harus berupa gambar.',
            'foto.*.mimes' => 'Format foto harus JPG, JPEG, PNG, atau WEBP.',
            'foto.*.max' => 'Ukuran setiap foto maksimal 5 MB.',
        ]);

        // Simpan foto ke penyimpanan Laravel
        $fotoPaths = [];

        foreach ($request->file('foto') as $foto) {
            $fotoPaths[] = $foto->store('foto-kos', 'public');
        }

        // Simpan data kos ke database
        Kos::create([
            'user_id' => $user->id,
            'nama_kos' => $validated['nama_kos'],
            'deskripsi' => $validated['deskripsi'],
            'nomor_telepon' => $validated['nomor_telepon'],
            'harga' => $validated['harga'],
            'lokasi' => $validated['lokasi'],
            'jumlah_kamar' => $validated['jumlah_kamar'],
            'kategori' => $validated['kategori'],
            'foto' => $fotoPaths,
        ]);

        return redirect()
            ->route('kos.index')
            ->with('success', 'Kos berhasil didaftarkan!');
    }
}
