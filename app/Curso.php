<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'cursos';
    protected $fillable = ['id','cur_nombre','cur_estado','iduregistra','iduactualiza','created_at','updated_at'];

    public function userRegistra(){
    	return $this->belongsTo('App\User','iduregistra','id');
    }

    public function userActualiza(){
    	return $this->belongsTo('App\User','iduactualiza','id');
    }

    public function materias(){
    	return $this->hasMany('App\Materia');
    }
}
