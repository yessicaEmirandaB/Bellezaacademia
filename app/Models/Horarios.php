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
        return $this->belongsTo(Aulas::class, 'id_aula');
    }

    // public function materias()
    // {
    //     return $this->belongsTo(Materias::class, 'Materias_id');
    // }
}
