<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('layanan_advokasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_telp');
            $table->string('kritik_saran');
            $table->timestamps();
        });
        Schema::table('layanan_advokasi', function (Blueprint $table) {
            $table->unsignedBigInteger('angkatan_id')->nullable();
            $table->foreign('angkatan_id')->references('id')->on('angkatan');
            $table->unsignedBigInteger('jurusan_id')->nullable();
            $table->foreign('jurusan_id')->references('id')->on('jurusan');
            $table->unsignedBigInteger('prodi_id')->nullable();
            $table->foreign('prodi_id')->references('id')->on('prodi');
            $table->unsignedBigInteger('layanan_id')->nullable();
            $table->foreign('layanan_id')->references('id')->on('layanan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan_advokasi');
    }
};