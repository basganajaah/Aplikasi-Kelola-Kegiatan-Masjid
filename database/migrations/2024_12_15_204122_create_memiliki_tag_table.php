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
        Schema::create('memiliki_tag', function (Blueprint $table) {
            $table->foreignId('tag_id')->constrained('tag', 'tag_id')->onDelete('cascade');
            $table->foreignId('activity_id')->constrained('kegiatan', 'activity_id')->onDelete('cascade');
            $table->primary(['tag_id', 'activity_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memiliki_tag');
    }
};
