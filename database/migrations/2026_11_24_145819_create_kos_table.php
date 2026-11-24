
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kos', function (Blueprint $table) {
            $table->id();

            // Pemilik kos
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->cascadeOnDelete();

            // Informasi kos
            $table->string('nama_kos');
            $table->text('deskripsi');
            $table->string('nomor_telepon', 20);
            $table->decimal('harga', 12, 2);
            $table->text('lokasi');
            $table->unsignedInteger('jumlah_kamar');
            $table->enum('kategori', ['campur', 'putra', 'putri']);

            // Foto kos disimpan dalam bentuk array JSON
            $table->json('foto')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kos');
    }
};
