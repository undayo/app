<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovisionnementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approvisionnements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fournisseur_id')->unsigned();
            $table->date('date');
            $table->timestamps();

            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('approvisionnements');
    }
}
