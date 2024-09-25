<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cursos extends Model
{
    use HasFactory;
   // protected $table = 'cursos';

    protected $primarykey='id';
    protected $table='cursos';
    protected $fillable=[
        'duracion_curso_id ',
        'nombrecurso',
        'precio',
    ];
    public function duracion(){
        return $this->belongsTo(Duracioncursos::class,'duracion_curso_id','id');
    }
}
