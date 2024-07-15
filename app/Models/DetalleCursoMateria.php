<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\cursos;
use App\Models\Materias;

class DetalleCursoMateria extends Model
{
    use HasFactory;
    protected $primarykey='id';
    protected $table='detalle_curso_materias';
    protected $fillable=[
        'id_curso',
        'id_materia',
        'id_horario',
    ];

    public function curso(){
        return $this->belongsTo(cursos::class,'id_curso','id');
    }
    public function materia(){
        return $this->belongsTo(Materia::class,'id_materia','id');
    }
    public function horario(){
        return $this->belongsTo(Materia::class,'id_horario','id');
    }
}
