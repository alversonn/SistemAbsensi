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
        Schema::create('sesi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_guru'); // Ganti dengan unsignedBigInteger
            $table->unsignedBigInteger('id_mapel'); // Ganti dengan unsignedBigInteger
            $table->unsignedBigInteger('id_kelas'); // Ganti dengan unsignedBigInteger
            $table->string('jam_mulai');
            $table->string('jam_selesai');
            $table->timestamps();

            // Mendefinisikan foreign key
            $table->foreign('id_guru')
                ->references('id')
                ->on('guru')
                ->onDelete('cascade');

            $table->foreign('id_mapel')
                ->references('id')
                ->on('mapel')
                ->onDelete('cascade');

            $table->foreign('id_kelas')
                ->references('id')
                ->on('kelas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sesi');
    }
};
