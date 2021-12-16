<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'email', 'nombre', 'password','role', 'tipo', 'raza', 'edad','localidad'

    ];

    public function parties()
    {
        return $this->hasMany(Party::class);
    }
    public function mensajes()
    {
        return $this->hasMany(Mensaje::class);
    }
}
