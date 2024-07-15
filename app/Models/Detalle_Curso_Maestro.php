<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_Curso_Maestro extends Model
{
    use HasFactory;
    protected $primarykey = 'id';
    protected $table = 'detalle_curso_maestros';
    protected $fillable = [
        'maestros_id',
        'cursos_id',

    ];

    public function maestros()
    {
        return $this->belongsTo(Maestros::class, 'maestros_id');
    }

    public function cursos()
    {
        return $this->belongsTo(cursos::class, 'cursos_id');
    }
}
