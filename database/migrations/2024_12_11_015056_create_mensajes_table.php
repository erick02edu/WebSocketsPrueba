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
        Schema::create('mensajes', function (Blueprint $table) {
            $table->id();
            $table->string("mensaje",175);

            $table->unsignedBigInteger("idEmisor");
            $table->foreign("idEmisor")->references("id")->on("users");

            $table->unsignedBigInteger("idReceptor");
            $table->foreign("idReceptor")->references("id")->on("users");

            $table->dateTime("FechaEnvio");
            $table->dateTime("FechaRecibido");

            $table->boolean("visto");

            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensajes');
    }
};
