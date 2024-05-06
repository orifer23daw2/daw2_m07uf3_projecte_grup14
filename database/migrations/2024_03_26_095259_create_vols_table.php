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
        Schema::create('vols', function (Blueprint $table) {
            $table->string('codi_vol', 6)->primary();
            $table->string('codi_model_avio');
            $table->string('ciutat_origen');
            $table->string('ciutat_destinacio');
            $table->string('terminal_origen');
            $table->string('terminal_destinacio');
            $table->date('data_sortida');
            $table->date('data_arribada');
            $table->time('hora_sortida');
            $table->time('hora_arribada');
            $table->string('classe');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vols');
    }
};
