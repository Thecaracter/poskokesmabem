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
        Schema::create('infokos', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kos');
            $table->string('nama_cp');
            $table->string('link_kos');
            $table->string('link_contact');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infokos');
    }
};