<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = 'estudiantes';
    protected $fillable = [
                            'id',
                            'est_rude',
                            'est_ci',
                            'est_expedido',
                            'est_nombre',
                            'est_paterno',
                            'est_materno',
                            'est_genero',
                            'est_sangre',
                            'est_nacimiento',
                            'est_lugar',
                            'est_direccion',
                            'est_telefono',
                            'est_celular',
                            'est_estado',
                            'est_obs',
                            'idtutor',
                            'iduregistra',
                            'iduactualiza',
                            'created_at',
                            'updated_at'
                        ];
                        
    public function tutores(){
        return $this->belongsTo('App\Tutor','idtutor','id');
    }

    public function calificaciones(){
        return $this->hasMany('App\Calificacion');
    }

    public function inscripciones(){
        return $this->hasMany('App\Inscripcion');
    }

    public function userRegistra(){
        return $this->belongsTo('App\User','iduregistra','id');
    }

    public function userActualiza(){
        return $this->belongsTo('App\User','iduactualiza','id');
    }
}
