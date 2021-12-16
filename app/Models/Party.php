<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nombre', 'idusuario', 'idgame',

    ];
    public function games()
    {
        return $this->belongsTo(Game::class);
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
