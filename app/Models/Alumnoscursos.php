<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnoscursos extends Model
{
    use HasFactory;
    protected $primarykey = 'id';
    protected $table = 'alumnoscursos';
    protected $fillable = [
        'Alumnos_id',
        'cursos_id',
        'Calificacion',
        'Estado',
    
    ];
}
