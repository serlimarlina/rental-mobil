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
        Schema::create('supir', function (Blueprint $table) {
            $table->id();
            $table->string('gambar', 200)->default('default.png');
            $table->string('nama', 100);
            $table->text('alamat');
            $table->text('telp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supir');
    }
};
