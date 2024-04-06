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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id('id_reservation');
            $table->date('date_entree');
            $table->date('date_sortie');
            $table->integer('nb_adultes');
            $table->integer('nb_enfants');
            $table->integer('nb_nuits');
            $table->string('etat_reservation');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
