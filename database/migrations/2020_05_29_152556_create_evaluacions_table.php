<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluacions', function (Blueprint $table) {
            $table->increments("id"); //es obligatorio el cod no lo coge
            $table->string("nombre");
            $table->string("fecha");
            $table->string("desc");
            $table->string("mejor");
            $table->string("peor");
            $table->string("equipo");
            $table->string("recordar")->nullable();
            $table->timestamps();// actualizar y borrar se deja 
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluacions');
    }
}
