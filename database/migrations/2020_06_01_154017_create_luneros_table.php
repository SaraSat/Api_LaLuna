<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLunerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luneros', function (Blueprint $table) {
            $table->increments("id"); //es obligatorio el cod no lo coge
            $table->string("nombre");
            $table->string("apellidos");
            $table->integer("telf");
            $table->integer("telf2")->nullable();
            $table->string("tutores");
            $table->string("patologias");
            $table->string("coment");
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
        Schema::dropIfExists('luneros');
    }
}
