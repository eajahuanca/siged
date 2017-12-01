<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idestudiante')->unsigned();
            $table->integer('idcurso')->unsigned();
            $table->enum('in_tipo',['NUEVO','ANTIGUO']);
            $table->string('in_colegio_anterior');
            $table->enum('in_cert_nacimiento',['SI','NO']);
            $table->enum('in_carnet',['SI','NO']);
            $table->enum('in_rude',['SI','NO']);
            $table->enum('in_libreta_anterior',['SI','NO']);
            $table->string('in_obs');
            $table->boolean('in_estado')->default(true);
            $table->integer('in_gestion')->default(date('Y'));
            $table->integer('iduregistra')->unsigned();
            $table->integer('iduactualiza')->unsigned();
            $table->timestamps();

            $table->foreign('idestudiante')->references('id')->on('estudiantes');
            $table->foreign('idcurso')->references('id')->on('cursos');
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
        Schema::dropIfExists('inscripciones');
    }
}
