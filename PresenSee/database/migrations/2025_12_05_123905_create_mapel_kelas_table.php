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
        Schema::create('mapel_kelas', function (Blueprint $table) {
            $table->id('id_mapel_kelas');
            $table->foreignId('id_mapel')->constrained('mapel', 'id_mapel')->onDelete('cascade');
            $table->foreignId('id_kelas')->constrained('kelas', 'id_kelas')->onDelete('cascade');
            $table->foreignId('id_guru')->constrained('users', 'id_user')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mapel_kelas');
    }
};
