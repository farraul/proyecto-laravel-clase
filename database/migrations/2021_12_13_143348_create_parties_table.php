<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parties', function (Blueprint $table) {
        
            $table->increments('id');
            $table->string('nombre',100);
            // $table->string('idusuario',100);
          
//////////////////Esto es para conectar con la id de juegos/////////////////////
            $table->unsignedInteger('idjuego');
            $table->foreign('idjuego')
            ->references('id')
            ->on('juegos')
            ->unsigned()
            ->constrained('juegos')
            ->onUpdate('cascade')
            ->onDelete('cascade');

//////////////////Esto es para conectar con la id de usuarios/////////////////////
            $table->unsignedInteger('idusuario');
            $table->foreign('idusuario')
            ->references('id')
            ->on('users')
            ->unsigned()
            ->constrained('users')
            ->onUpdate('cascade')
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
        Schema::dropIfExists('parties');
    }
}
