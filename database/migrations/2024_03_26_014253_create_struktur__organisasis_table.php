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
        Schema::create('struktur__organisasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_organisasi');
            $table->string('jabatan');
            $table->string('nama_pengurus');
            $table->string('foto_pengurus');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('struktur__organisasis');
    }
};
