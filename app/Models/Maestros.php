<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maestros extends Model
{
    use HasFactory;

    protected $primarykey = 'id';
    protected $table = 'maestros';
    protected $fillable = [
        'apellidos',
        'nombres',
        'ci',
        'direccion',
        'celular',
        'correo',
        'Foto',
        'especialidad',
    ];
    public function cursos(){
        return $this->belongsToMany(cursos::class,'detalle__curso__maestros');
    }
}
