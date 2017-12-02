<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table = 'inscripciones';
    protected $fillable = [
                            'id',
                            'idestudiante',
                            'idcurso',
                            'in_tipo',
                            'in_colegio_anterior',
                            'in_cert_nacimiento',
                            'in_carnet',
                            'in_rude',
                            'in_libreta_anterior',
                            'in_obs',
                            'in_estado',
                            'in_gestion',
                            'iduregistra',
                            'iduactualiza',
                            'created_at',
                            'updated_at'
                        ];

    public function estudiantes(){
        return $this->belongsTo('App\Estudiante','idestudiante','id');
    }

    public function cursos(){
        return $this->belongsTo('App\Curso','idcurso');
    }

    public function userRegistra(){
        return $this->belongsTo('App\User','iduregistra','id');
    }

    public function userActualiza(){
        return $this->belongsTo('App\User','iduactualiza','id');
    }
}
