<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $table = 'estado';

    protected $primaryKey = 'estado_id';
	
	protected $fillable = [
	    'sigla',
        'nome',
	];

    public function cidades(){
        return $this->hasMany(Cidade::class, 'estado_id', 'estado_id');
    }
}
