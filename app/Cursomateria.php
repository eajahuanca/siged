<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cursomateria extends Model
{
    protected $table = 'curso_materia';
    protected $fillable = [
                            'id',
                            'idcurso',
                            'idmateria',
                            'iddocente',
                            'cm_lun',
                            'cm_lun_hora',
                            'cm_mar',
                            'cm_mar_hora',
                            'cm_mie',
                            'cm_mie_hora',
                            'cm_jue',
                            'cm_jue_hora',
                            'cm_vie',
                            'cm_vie_hora',
                            'cm_sab',
                            'cm_sab_hora',
                            'cm_estado',
                            'iduregistra',
                            'iduactualiza',
                            'created_at',
                            'updated_at'
                        ];

    public function cursos(){
        return $this->belongsToMany('App\Curso','idcurso','id');
    }

    public function materias(){
        return $this->belongsToMany('App\Materia','idmateria','id');
    }

    public function docentes(){
        return $this->belongsTo('App\Docente','iddocente','id');
    }

    public function userRegistra(){
        return $this->belongsTo('App\User','iduregistra','id');
    }

    public function userActualiza(){
        return $this->belongsTo('App\User','iduactualiza','id');
    }
}
