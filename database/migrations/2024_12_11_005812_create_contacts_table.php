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
        Schema::create('contacts', function (Blueprint $table) {

            $table->unsignedBigInteger("idContact");
            $table->foreign("idContact")->references("id")->on("users");

            $table->string("name");

            $table->unsignedBigInteger("idChat");
            $table->foreign("idChat")->references("id")->on("chats");

            $table->unsignedBigInteger("idUser");
            $table->foreign("idUser")->references("id")->on("users");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
