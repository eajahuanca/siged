<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $table = 'tutores';
    protected $fillable = [
                            'id',
                            'tut_tipo',
                            'tut_ci',
                            'tut_expedido',
                            'tut_nombre',
                            'tut_paterno',
                            'tut_materno',
                            'tut_genero',
                            'tut_ocupacion',
                            'tut_celular',
                            'tut_telefono',
                            'tut_direccion',
                            'created_at',
                            'updated_at'
                        ];
    
    public function estudiantes(){
        return $this->hasMany('App\Estudiante');
    }
}
