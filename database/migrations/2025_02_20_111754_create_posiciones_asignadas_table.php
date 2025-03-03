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
        Schema::create('posiciones_asignadas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('futbolista_id');
            $table->unsignedBigInteger('posicion_id');
            $table->foreign('futbolista_id')->references('id')->on('futbolistas')->onDelete('cascade');
            $table->foreign('posicion_id')->references('id')->on('posiciones')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posiciones_asignadas');
    }
};
