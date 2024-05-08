<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Puntuaciones extends Model
{
    public function jugador(){
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'id_usuario',
        'puntuacion',
    ];
    use HasFactory;

    public function User()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
    
    public $timestamps = false;

}
