<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PessoaFisica extends Model
{
	protected $table = 'pessoa_fisica';
	
	protected $fillable = [
	    'nome',
	    'cpf',
	    'endereco',
	    'cidade_id',
	    'estado_id'
	];
	
    public static function createPessoaFisica(PessoaFisica $pessoa){
    	return $pessoa->save();
    }
    
    public static function updatePessoaFisica(PessoaFisica $pessoa){
    	return $pessoa->save();
    }
    
    public static function loadPessoaFisicaById($id){
        return PessoaFisica::find($id)->first();
    }
    
    public static function deletePessoaFisica(PessoaFisica $pessoa){
        $pessoa = self::loadPessoaFisicaById($pessoa);
    	return $pessoa->delete();
    }

	public function inscricao(){
		return $this->belongsTo(Inscricao::class, 'id', 'pessoa_fisica_id');
	}

	public function cidade(){
		return $this->belongsTo(Cidade::class, 'cidade_id', 'cidade_id');
	}

	public function estado(){
		return $this->belongsTo(Estado::class, 'estado_id', 'estado_id');
	}
  
}
