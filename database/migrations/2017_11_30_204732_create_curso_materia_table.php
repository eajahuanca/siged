<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoMateriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_materia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idcurso')->unsigned();
            $table->integer('idmateria')->unsigned();
            $table->integer('iddocente')->unsigned();
            $table->string('cm_lun');
            $table->string('cm_lun_hora');
            $table->string('cm_mar');
            $table->string('cm_mar_hora');
            $table->string('cm_mie');
            $table->string('cm_mie_hora');
            $table->string('cm_jue');
            $table->string('cm_jue_hora');
            $table->string('cm_vie');
            $table->string('cm_vie_hora');
            $table->string('cm_sab');
            $table->string('cm_sab_hora');
            $table->boolean('cm_estado')->default(true);
            $table->integer('iduregistra')->unsigned();
            $table->integer('iduactualiza')->unsigned();
            $table->timestamps();

            $table->foreign('idcurso')->references('id')->on('cursos');
            $table->foreign('idmateria')->references('id')->on('materias');
            $table->foreign('iddocente')->references('id')->on('docentes');
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
        Schema::dropIfExists('curso_materia');
    }
}
