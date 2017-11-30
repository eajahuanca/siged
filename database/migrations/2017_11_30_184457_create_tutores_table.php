<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutores', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('tut_tipo',['PADRE','MADRE','TUTOR']);            
            $table->string('tut_ci');
            $table->string('tut_expedido');
            $table->string('tut_nombre');
            $table->string('tut_paterno');
            $table->string('tut_materno');
            $table->string('tut_genero');
            $table->enum('tut_ocupacion',['INGENIERO(A)','ARQUITECTO(A)','ABOGADO(A)','DOCTOR(A)','LICENCIADO(A)','AMA DE CASA','ARTESANO(A)','CARPINTERO']);
            $table->string('tut_celular')->default('0');
            $table->string('tut_telefono')->default('0');
            $table->string('tut_direccion')->default('0');
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
        Schema::dropIfExists('tutores');
    }
}
