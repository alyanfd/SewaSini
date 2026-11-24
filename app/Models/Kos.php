<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kos extends Model
{
    protected $table = 'kos';

    protected $fillable = [
        'user_id',
        'nama_kos',
        'deskripsi',
        'nomor_telepon',
        'harga',
        'lokasi',
        'jumlah_kamar',
        'kategori',
        'foto',
    ];

    protected function casts(): array
    {
        return [
            'foto' => 'array',
            'harga' => 'decimal:2',
        ];
    }

    // Relasi ke akun pemilik kos
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
