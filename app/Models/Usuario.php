<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    // Nombre de la tabla en la base de datos
    protected $table = 'usuarios';

    protected $fillable = ['nombre', 'correo', 'password'];



    public $timestamps = false;
    public function tareas()
    {
        return $this->hasMany(Tarea::class, 'usuario_id');
    }
}
