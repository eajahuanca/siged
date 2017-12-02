<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = 'docentes';
    protected $fillable = [
                            'id',
                            'doc_foto',
                            'doc_ci',
                            'doc_expedido',
                            'doc_nombre',
                            'doc_paterno',
                            'doc_materno',
                            'doc_genero',
                            'doc_especialidad',
                            'doc_rda',
                            'doc_direccion',
                            'doc_telefono',
                            'doc_celular',
                            'doc_estado',
                            'iduregistra',
                            'iduactualiza',
                            'created_at',
                            'updated_at'
                        ];
    
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
