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
        Schema::table('reservations', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id');
            //$table->unsignedBigInteger('employe_id');
            $table->unsignedBigInteger('chambre_id');
           // $table->unsignedBigInteger('paiement_id');
           // $table->foreign('paiement_id')->references('id_paiement')->on('paiements');
            $table->foreign('client_id')->references('id_client')->on('clients');
           // $table->foreign('employe_id')->references('id_employe')->on('employes');
            $table->foreign('chambre_id')->references('id_chambre')->on('chambres');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            //
        });
    }
};
