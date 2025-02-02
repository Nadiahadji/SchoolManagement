<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormateursTable extends Migration
{
    public function up()
    {
        Schema::create('formateurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('tel');
            $table->string('address');
            $table->text('specialties');
            $table->text('qualifications');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('formateurs');
    }
}
