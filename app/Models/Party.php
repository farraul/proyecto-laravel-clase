<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nombre', 'idusuario', 'idjuego',

    ];
    public function juegos()
    {
        return $this->belongsTo(Juego::class);
    }

    public function usuarios()
    {
        return $this->belongsTo(User::class);
    }
    
    public function mensajes()
    {
        return $this->hasMany(Mensaje::class);
    }

}
