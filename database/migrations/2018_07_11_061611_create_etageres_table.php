<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtageresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etageres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom')->index();
            $table->integer('rayon_id')->unsigned();
            $table->timestamps();

            $table->foreign('rayon_id')->references('id')->on('rayons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etageres');
    }
}
