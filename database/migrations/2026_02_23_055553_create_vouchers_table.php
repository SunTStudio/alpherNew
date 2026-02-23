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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            // voucher bisa untuk materi/sub materi, jadi nullable
            $table->foreignId('materi_id')->nullable()->constrained('materis')->onDelete('cascade');
            $table->foreignId('sub_materi_id')->nullable()->constrained('sub_materis')->onDelete('cascade');
            $table->string('kode_voucher')->unique();
            $table->integer('kuota')->default(1);
            $table->integer('durasi')->comment('dalam hari, contoh 7 hari akses');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
