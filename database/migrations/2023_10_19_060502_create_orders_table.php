<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            // $table->foreignId('id_lab');,
            $table->date('order');
            // $table->integer('lama_sewa'); ini di gunakan jika bisa menyewa beberapa hari langsung
            $table->integer('total_biaya');
            $table->enum('status', ['pending', 'approved']);
            $table->string('nama_pemesan');
            $table->enum('jenis_pesanan', ['Sewa Lab', 'Jasa Analisis']);
            $table->string('no_telp');
            $table->string('bukti_pembayaran')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
