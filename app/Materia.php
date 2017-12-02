<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = 'materias';
    protected $fillable = ['id','mat_nombre','mat_descripcion','mat_estado','idcurso','iduregistra','iduactualiza','created_at','updated_at'];

    public function cursos(){
    	return $this->belongsTo('App\Curso','idcurso','id');
    }

    public function userRegistra(){
    	return $this->belongsTo('App\User','iduregistra','id');
    }

    public function userActualiza(){
    	return $this->belongsTo('App\User','iduactualiza','id');
    }

    public function cursomaterias(){
        return $this->hasMany('App\Cursomateria');
    }
}
