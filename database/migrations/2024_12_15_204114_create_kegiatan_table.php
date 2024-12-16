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
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id('activity_id');
            $table->foreignId('id')->constrained('users')->onDelete('cascade');
            $table->foreignId('category_id')->nullable()->constrained('kategori', 'category_id')->onDelete('set null');
            $table->string('activity_name', 255);
            $table->string('penyelenggara', 50);
            $table->dateTime('datetime_started');
            $table->dateTime('datetime_finished');
            $table->string('location', 255);
            $table->integer('max_participant')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['Belum Mulai', 'Berlangsung', 'Selesai', 'Ditunda'])->default('Belum Mulai');
            $table->enum('verification', ['Menunggu verifikasi', 'Terverifikasi', 'Ditolak'])->default('Menunggu verifikasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan');
    }
};
