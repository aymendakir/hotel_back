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
        Schema::create('hotel_chambers', function (Blueprint $table) {
            $table->bigIncrements('id_chamber');
            $table->string('name');
            $table->string('image');
            $table->string('beds_type');
            $table->string('beds_number')->nullable();
            $table->string('baths_number')->nullable();
            $table->float('prix');
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_chambers');
    }
};
