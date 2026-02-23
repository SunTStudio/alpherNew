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
        Schema::create('akses_materis', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('materi_id')->nullable()->constrained('materis')->onDelete('cascade');
            $table->foreignId('sub_materi_id')->nullable()->constrained('sub_materis')->onDelete('cascade');

            $table->dateTime('tanggal_akses')->nullable();
            $table->dateTime('tanggal_kadaluarsa')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akses_materis');
    }
};
