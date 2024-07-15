<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Materias extends Model
{
    use HasFactory;

    protected $primarykey='id';
    protected $table='materias';
    protected $fillable=[
        'nombremateria'
    ];

    public function cursos(){
        return $this->belongsTo(cursos::class,'cursos_id','id');
    }
    public function aulas(){
        return $this->belongsToMany(Aulas::class,'aulas');
    }
}
