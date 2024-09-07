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
        Schema::create('eleves', function (Blueprint $table) {
            $table->id();
            
            $table->string('nom');
            $table->string('prenom');
            // $table->string('prenom_pere');
            // $table->string('nom_complet_mere');
            $table->string('tel')->nullable();
            $table->string('tel_parent');
            $table->string('niv');
            $table->date('date_naissance')->nullable();
            $table->date('date_inscription');
            $table->integer('offre');
            // $table->integer('versement');
            // $table->integer('reste');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eleves');
    }
};
