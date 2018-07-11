<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom')->index();
            $table->float('prix');
            $table->string('image');
            $table->integer('categorie_id')->unsigned();
            $table->integer('rayon_id')->unsigned();
            $table->integer('etagere_id')->unsigned();
            $table->timestamps();

            $table->foreign('categorie_id')->references('id')->on('categories');
            $table->foreign('rayon_id')->references('id')->on('rayons');
            $table->foreign('etagere_id')->references('id')->on('etageres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits');
    }
}
