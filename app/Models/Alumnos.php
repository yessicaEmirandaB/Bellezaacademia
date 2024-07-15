<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Alumnos extends Model
{
    use HasFactory;
    public function cursos(){
        return $this->belongsToMany(cursos::class,'alumnoscursos');
    }
        protected $primarykey='id';
        protected $table='alumnos';
        protected $fillable=[
            'Apellidos',
            'Nombres',
            'CI',
            'Direccion',
            'Celular',
            'Correo',
            'Foto',
        ];

}
