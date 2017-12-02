<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $table = 'calificaciones';
    protected $fillable = [
                            'id',
                            'idestudiante',
                            'idcurso',
                            'idmateria',
                            'cal_cuantitativo',
                            'cal_cualitativo',
                            'cal_bimestre',
                            'cal_obs',
                            'cal_estado',
                            'iduregistra',
                            'iduactualiza',
                            'created_at',
                            'updated_at'
                        ];

    public function estudiantes(){
        return $this->belongsTo('App\Estudiante','idestudiante','id');
    }

    public function cursos(){
        return $this->belongsTo('App\Curso','idcurso','id');
    }

    public function materias(){
        return $this->belongsTo('App\Materia','idmateria','id');
    }

    public function userRegistra(){
        return $this->belongsTo('App\User','iduregistra','id');
    }

    public function userActualiza(){
        return $this->belongsTo('App\User','iduactualiza','id');
    }
}
