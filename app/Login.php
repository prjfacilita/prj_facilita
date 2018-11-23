<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Login extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'login';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'permissao', 'cpf', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];



    public function types($types =  null) //admin, instrutor, paciente
    {
        $opTypes = [
//            'patient'       => 'Paciente',
//            'instructor'    => 'Instrutor',
//            'administrator' => 'Administrador',
        ];
        if (!$types)
            return $opTypes;
        return $opTypes[$types];
    }
}