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
        'nombrecurso',
        'precio',
    ];
    public function alumnos(){
        return $this->belongsToMany(Alumnos::class,'alumnoscursos');
    }
    public function maestros(){
        return $this->belongsToMany(Maestros::class,'detalle__curso__maestros');
    }
    public function materia(){
        return $this->hasMany(Materias::class,'id');
    }
}
