<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalificacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idestudiante')->unsigned();
            $table->integer('idcurso')->unsigned();
            $table->integer('idmateria')->unsigned();
            $table->decimal('cal_cuantitativo',18,2);
            $table->text('cal_cualitativo');
            $table->enum('cal_bimestre',['PRIMER BIMESTRE','SEGUNDO BIMESTRE','TERCER BIMESTRE','CUARTO BIMESTRE']);
            $table->text('cal_obs');
            $table->boolean('cal_estado')->default(true);
            $table->integer('iduregistra')->unsigned();
            $table->integer('iduactualiza')->unsigned();
            $table->timestamps();

            $table->foreign('idestudiante')->references('id')->on('estudiantes');
            $table->foreign('idcurso')->references('id')->on('cursos');
            $table->foreign('idmateria')->references('id')->on('materias');
            $table->foreign('iduregistra')->references('id')->on('users');
            $table->foreign('iduactualiza')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calificaciones');
    }
}
