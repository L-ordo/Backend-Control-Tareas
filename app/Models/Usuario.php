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

    // Campos permitidos para asignación masiva
    protected $fillable = ['nombre', 'correo', 'password'];

    // Ocultar ciertos campos en las respuestas JSON
    // protected $hidden = ['password', 'remember_token'];

    // Relación con tareas
    public function tareas()
    {
        return $this->hasMany(Tarea::class, 'usuario_id');
    }
}
