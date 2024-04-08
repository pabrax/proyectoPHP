<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado_Tarea extends Model
{
    use HasFactory;

    protected $table = 'empleados_tareas';

    protected $fillable = [
        'empleado_id',
        'tarea_id',
        'fecha_entrega'
    ];
}
