<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('doc_foto');
            $table->string('doc_ci');
            $table->string('doc_expedido');
            $table->string('doc_nombre');
            $table->string('doc_paterno');
            $table->string('doc_materno');
            $table->string('doc_genero');
            $table->enum('doc_especialidad',['MATEMATICA','CIENCIAS NATURALES','FISICA','QUIMICA','BIOLOGIA','HISTORIA','DOCENTE DE AULA','INICIAL','EDUCACION FISICA','ARTES PLASTICAS']);
            $table->string('doc_rda');
            $table->string('doc_direccion');
            $table->string('doc_telefono');
            $table->string('doc_celular');
            $table->boolean('doc_estado')->default(true);
            $table->integer('iduregistra')->unsigned();
            $table->integer('iduactualiza')->unsigned();
            $table->timestamps();

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
        Schema::dropIfExists('docentes');
    }
}
