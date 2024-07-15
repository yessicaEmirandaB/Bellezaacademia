<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duracioncursos extends Model
{
    use HasFactory;
    protected $primarykey='id';
    protected $table='duracioncursos';
    protected $fillable=[
        
        'fechaInicio',
        'fechaFin',
        'cursos_id',
    ];

    public function cursos(){
        return $this->belongsTo(cursos::class,'cursos_id','id');
    }
}
