<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sectores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sectores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cc_id')->unsigned();
            $table->foreign('cc_id')->references('id')
                ->on('consejos_comunales')
                ->onDelete('cascade');
            $table->string('nombre');
            $table->string('descripcion')->nullable();
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
        Schema::dropIfExists('sectores');
    }
}
