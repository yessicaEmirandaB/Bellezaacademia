<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagoCursos extends Model
{
    use HasFactory;
    protected $primarykey = 'id';
    protected $table = 'pago_cursos';
    protected $fillable = [
        'alumnocurso_id',
        'fecha',
        'usuario',
        'monto',
        'metodo_pago',
        'observacion',
        'alumno_id',
        'curso_id',
    ];
    public function AlumnosCursos()
    {
        return $this->belongsTo(Alumnoscursos::class, 'alumnocurso_id');
    }
    public function Alumnos()
    {
        return $this->belongsTo(Alumnos::class,'alumno_id');
    }
    public function cursos()
    {
        return $this->belongsTo(Cursos::class,'curso_id');
    }


}
