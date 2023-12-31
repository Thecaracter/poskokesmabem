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
            $table->text('link_kos_jbr');
            $table->text('link_kos_bws');
            $table->text('link_tanggapan');
            $table->text('link_kebijakankampus');
            $table->string('nama_cp');
            $table->text('link_contact');

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