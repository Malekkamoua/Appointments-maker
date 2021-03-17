<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string("ddn");
            $table->string('sexe');
            $table->string('adresse');
            $table->string('gsm');

            $table->string('motif_test');

            $table->string('pays')->nullable();
            $table->string('email')->nullable();
            $table->string('billet')->nullable();
            $table->string('passport')->nullable();

            $table->string('date_rdv');
            $table->unsignedBigInteger('horaire_id');
            $table->timestamps();
        });

        Schema::table('fiches', function (Blueprint $table) {
            $table->foreign('horaire_id')->references('id')->on('horaires')->onDelete('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fiches');
    }
}
