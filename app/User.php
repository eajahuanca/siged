<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    protected $fillable = [
                            'us_nombre', 
                            'us_paterno', 
                            'us_materno',
                            'us_genero',
                            'email',
                            'us_cuenta',
                            'us_tipo',
                            'us_estado',
                            'us_obs',
                            'created_at',
                            'updated_at'
                        ];

    protected $hidden = [
                            'password',
                            'remember_token',
                        ];

    public function cursos(){
        return $this->hasMany('App\Curso');
    }

    public function materias(){
        return $this->hasMany('App\Materia');
    }
}