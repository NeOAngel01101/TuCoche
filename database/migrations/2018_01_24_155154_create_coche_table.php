<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCocheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coches', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('nombre');
            $table->string('marca');
            $table->string('tipo');
            $table->date('year');
            $table->string('repostaje');
            $table->integer('kilometros');
            $table->integer('cv');
            $table->string('localidad');
            $table->string('cambio');
            $table->text('descripcion');
            $table->integer('precio');
            $table->text('fichatecnica')->nullable();
            $table->text('imagen1');
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
        Schema::dropIfExists('id');
    }
}
