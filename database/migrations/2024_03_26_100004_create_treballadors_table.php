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
        Schema::create('treballadors', function (Blueprint $table) {
            $table->id();
            $table->string('nom_cognoms');
            $table->string('email')->unique();
            $table->string('contrasenya');
            $table->string('tipus');
            $table->timestamp('darrera_hora_entrada')->nullable();
            $table->timestamp('darrera_hora_sortida')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treballadors');
    }
};
