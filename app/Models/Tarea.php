<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    // Nombre de la tabla en la BD
    protected $table = 'tareas';

    // Permitir asignación masiva (ajusta los campos según tu BD)
    // protected $fillable = ['titulo', 'descripcion', 'completada', 'usuario_id'];
    protected $fillable = ['usuario_id', 'titulo', 'descripcion', 'completada'];

    // Opción alternativa: Bloquear todos los campos menos los que especifiques
    // protected $guarded = [];

     // Deshabilitar el uso de created_at y updated_at
     public $timestamps = false;

    // Relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
