<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estado extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'estado';

    protected $primaryKey = 'estado_id';

    protected $fillable = [
        'sigla',
        'nome',
    ];

    public static function createEstado(Estado $estado)
    {
        return $estado->save();
    }

    public function cidades()
    {
        return $this->hasMany(Cidade::class, 'estado_id', 'estado_id');
    }
}
