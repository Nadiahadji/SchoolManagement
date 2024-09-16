<?php

// database/migrations/xxxx_xx_xx_add_montant_verse_to_paiement_formations_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMontantVerseToPaiementFormationsTable extends Migration
{
    public function up()
    {
        Schema::table('paiement_formations', function (Blueprint $table) {
            $table->decimal('montant_verse', 10, 2)->default(0);
        });
    }

    public function down()
    {
        Schema::table('paiement_formations', function (Blueprint $table) {
            $table->dropColumn('montant_verse');
        });
    }
}

