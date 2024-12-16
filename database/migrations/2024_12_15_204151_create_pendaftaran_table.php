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
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id('registration_id');
            $table->foreignId('id')->constrained('users')->onDelete('cascade');
            $table->foreignId('activity_id')->constrained('kegiatan', 'activity_id')->onDelete('cascade');
            $table->string('registrant_name', 255);
            $table->integer('age');
            $table->boolean('gender');
            $table->date('registration_date');
            $table->string('registration_status', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};
