<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleRegistroAlumno extends Model
{
    use HasFactory;
    protected $primarykey='id';
    protected $table='detalle_registro_alumnos';
    protected $fillable=[
        'id_detalle_alumno_curso',
        'id_detalle_curso_materia',
    ];

    public function detalle_alumno_curso(){
        return $this->belongsTo(cursos::class,'id_detalle_alumno_curso','id');
    }
    public function matedetalle_curso_materia(){
        return $this->belongsTo(Materia::class,'id_detalle_curso_materia','id');
    }
}
