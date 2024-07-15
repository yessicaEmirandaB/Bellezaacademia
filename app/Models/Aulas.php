<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aulas extends Model
{
    public function materia(){
        return $this->belongsToMany(Materias::class,'materias');
    }
    use HasFactory;
    protected $primarykey='id';
    protected $table='aulas';
    protected $fillable=[
        'NumAula',
        'Capacidad',
    ];
}
