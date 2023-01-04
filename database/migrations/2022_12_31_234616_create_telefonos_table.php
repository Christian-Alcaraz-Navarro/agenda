<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelefonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefonos', function (Blueprint $table) {
           // Schema::dropIfExists('telefonos');
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('id_persona')->nullable()->references('id')->on('personas');
            //$table->bigincrements('id_per')->unsigned();//Nunca definas llaves foraneas o incluso campos en la base de datos asi 'id_per' es muy mala practica
            //$table->foreign('id_per')->references('id')->on('personas');Es mas optima la primera forma para declarar llaves foraneas no simpre deben ser null las relaciones ver documentacion de base de datos
            $table->string('telefono')->nullable();
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
        Schema::dropIfExists('telefonos');
    }
}



