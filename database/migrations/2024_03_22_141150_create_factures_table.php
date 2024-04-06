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
        Schema::create('factures', function (Blueprint $table) {
            $table->id('id_facture');
            $table->decimal('montant', 8, 2);
           // $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('paiement_id');
         //   $table->foreign('client_id')->references('id_client')->on('clients');
            $table->foreign('paiement_id')->references('id_paiement')->on('paiements');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
