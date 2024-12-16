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
        Schema::create('mendapat_notifikasi', function (Blueprint $table) {
            $table->foreignId('notification_id')->constrained('notification', 'notification_id')->onDelete('cascade');
            $table->foreignId('id')->constrained('users')->onDelete('cascade');
            $table->primary(['notification_id', 'id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mendapat_notifikasi');
    }
};
