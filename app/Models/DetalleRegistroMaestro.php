<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleRegistroMaestro extends Model
{
    use HasFactory;
    protected $primarykey='id';
    protected $table='detalle_registro_maestros';
    protected $fillable=[
        'id_detalle_curso_maestro',
        'id_detalle_curso_materia',
    ];

    public function detalle_curso_maestros(){
        return $this->belongsTo(cursos::class,'id_detalle_curso_maestro','id');
    }
    public function detalle_curso_materias(){
        return $this->belongsTo(Materias::class,'id_detalle_curso_materia','id');
    }
}
