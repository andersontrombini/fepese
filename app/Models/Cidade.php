<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cidade extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cidade';

    protected $primaryKey = 'cidade_id';

    protected $fillable = [
        'estado_id',
        'nome',
    ];

    public static function createCidade(Cidade $cidade)
    {
        return $cidade->save();
    }
}
