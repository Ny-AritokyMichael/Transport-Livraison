<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrajetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trajets', function (Blueprint $table) {
            $table->id();
            $table->string('lieuTrajet');
            $table->string('typeTrajet');
            $table->integer('debutKilometrage');
            $table->integer('arriveKilometrage');
            $table->date('dateDepart');
            $table->time('heureDepart');
            $table->date('dateArrive');
            $table->time('heureArrive');
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
        Schema::dropIfExists('trajets');
    }
}
