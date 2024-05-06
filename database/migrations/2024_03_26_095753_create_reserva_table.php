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
        Schema::create('reserva', function (Blueprint $table) {
            $table->string('passaport_client', 20);
            $table->string('codi_vol', 6);
            $table->string('localitzador')->unique();
            $table->integer('numero_seient');
            $table->string('equipatge_ma');
            $table->string('equipatge_cabina');
            $table->integer('quantitat_equipatges');
            $table->string('tipus_assegurança', ['Franquícia fins a 1000 Euros', 'Franquícia fins 500 Euros', 'Sense franquícia']);
            $table->decimal('preu_vol', 8, 2);
            $table->string('tipus_checking', ['on-line', 'mostrador', 'quiosc']);
            $table->primary(['passaport_client', 'codi_vol']);
            $table->foreign('passaport_client')->references('passaport_client')->on('clients')->onDelete('cascade');
            $table->foreign('codi_vol')->references('codi_vol')->on('vols')->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserva');
    }
};
