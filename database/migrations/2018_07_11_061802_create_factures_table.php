<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->date('date');
            $table->integer('vente_id')->unsigned();
            $table->float('remise');
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('vente_id')->references('id')->on('ventes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factures');
    }
}
