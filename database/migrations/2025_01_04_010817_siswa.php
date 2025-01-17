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
    Schema::create('siswa', function (Blueprint $table) {
      $table->id();
      $table->integer('nisn')->unique(); // NISN sebaiknya unik
      $table->string('nama');
      $table->unsignedBigInteger('kelas'); // Tipe yang sesuai untuk foreign key
      $table->enum('status', ['Alpha', 'Hadir']);
      $table->string('kelas')->nullable()->default(null)->change();
      $table->timestamps();

      $table->foreign('kelas')
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
    Schema::dropIfExists('siswa');
  }
};
