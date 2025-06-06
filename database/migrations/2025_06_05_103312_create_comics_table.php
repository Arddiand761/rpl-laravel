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
        Schema::create('comics', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul komik
            $table->string('author'); // Penulis
            $table->string('publisher')->nullable(); // Penerbit (opsional)
            $table->text('description')->nullable(); // Deskripsi (opsional)
            $table->string('cover_image')->nullable(); // Path atau nama file gambar sampul (opsional)
            $table->string('status')->default('Ongoing')->after('description'); // Contoh: Ongoing, Completed, Hiatus
            $table->integer('chapter');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comics', function (Blueprint $table) {
            $table->integer('stock')->default(0)->after('description');
            $table->dropColumn('status');
        });
    }
};
