<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarnetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carnets', function (Blueprint $table) {
            $table->id();
            $table->string('lieuTrajet');
            $table->string('typeTrajet');
            $table->integer('debutKilometrage');
            $table->date('dateDepart');
            $table->time('heureDepart');
            $table->string('montantCarburant');
            $table->string('quantiteCarburant');
            $table->string('motif');
            $table->foreignID('chauffeur_id')->constrained()->onDelete('cascade');
            $table->foreignID('voiture_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carnets');
    }
}
