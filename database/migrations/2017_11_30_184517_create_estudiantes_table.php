<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('est_rude');
            $table->string('est_nombre');
            $table->string('est_paterno');
            $table->string('est_materno');
            $table->string('est_ci');
            $table->string('est_expedido',10);
            $table->string('est_genero');
            $table->string('est_sangre')->default('ORH+');
            $table->date('est_nacimiento');
            $table->string('est_lugar');
            $table->string('est_direccion')->default('0');
            $table->string('est_telefono')->default('0');
            $table->string('est_celular')->default('0');
            $table->boolean('est_estado')->default(true);
            $table->text('est_obs');
            $table->integer('idtutor')->unsigned();
            $table->integer('iduregistra')->unsigned();
            $table->integer('iduactualiza')->unsigned();
            $table->timestamps();

            $table->foreign('idtutor')->references('id')->on('tutores');
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
        Schema::dropIfExists('estudiantes');
    }
}
