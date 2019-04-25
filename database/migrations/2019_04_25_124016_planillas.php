<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Planillas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planillas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->integer('cc_id')->unsigned();
            $table->foreign('cc_id')->references('id')
                ->on('consejos_comunales')
                ->onDelete('cascade');
            $table->integer('comuna_id')->unsigned();
            $table->foreign('comuna_id')->references('id')
                ->on('comunas')
                ->onDelete('cascade');
            $table->integer('sector_id')->unsigned();
            $table->foreign('sector_id')->references('id')
                ->on('sectores')
                ->onDelete('cascade');
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
        Schema::dropIfExists('planillas');
    }
}
