<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horarios extends Model
{
    use HasFactory;

    protected $primarykey = 'id';
    protected $table = 'horarios';
    protected $fillable = [
        'id_aula',
        'HoraInicio',
        'HoraFinal',

    ];

    public function aulas()
    {
        return $this->belongsTo(Aulas::class, 'Aulas_id');
    }

    // public function materias()
    // {
    //     return $this->belongsTo(Materias::class, 'Materias_id');
    // }
}
