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
        Schema::create('alat_tambahans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->string('jenis_alat');
            $table->integer('harga');
            $table->string('foto')->nullable();
            $table->enum('status', ['tersedia', 'di gunakan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alat_tambahans');
    }
};
