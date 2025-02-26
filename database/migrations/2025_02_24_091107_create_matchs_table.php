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
        Schema::create('matchs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idCompetition');
            $table->unsignedBigInteger('idEquipeDomicile');
            $table->unsignedBigInteger('idEquipeExterieur');
            $table->date('dateMatch');
            $table->integer('scoreDomicile')->nullable();
            $table->integer('scoreExterieur')->nullable();
            $table->timestamps();

            $table->foreign('idCompetion')->references('id')->on('competitons')->onDelete('cascade');
            $table->foreign('idEquipeDomicile')->references('id')->on('equipes')->onDelete('cascade');
            $table->foreign('idEquipeExterieur')->references('id')->on('equipes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matchs');
    }
};
