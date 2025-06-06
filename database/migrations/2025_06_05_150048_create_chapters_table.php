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
        Schema::create('chapters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comic_id')->constrained()->onDelete('cascade'); // Foreign key ke tabel comics
            $table->string('chapter_number'); // Nomor chapter (bisa 1, 1.5, 'Extra')
            $table->string('title')->nullable(); // Judul chapter (opsional)
            $table->integer('order')->default(0); // Untuk pengurutan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chapters');
    }
};
