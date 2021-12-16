<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;
    protected $fillable = [
        'idusuario', 'idparty', 'mensaje'

    ];
    public function parties()
    {
        return $this->belongsTo(Party::class);
    }
    public function usuarios()
    {
        return $this->belongsTo(User::class);
    }
}
