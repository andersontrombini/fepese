<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
	protected $table = 'inscricao';
	
	protected $fillable = [
	    'pessoa_fisica_id',
	    'cargo',
	    'situacao'
	];
	
	public static function createInscricao(Inscricao $inscricao){
    	return $inscricao->save();
    }
    
    public static function updateInscricao(Inscricao $inscricao){
    	return $inscricao->update();
    }
    
    public static function loadInscricaoById($id){
        return Inscricao::find($id)->first();
    }
    
    public static function deleteInscricao(Inscricao $inscricao){
        $inscricao = self::loadInscricaoById($inscricao);
    	return $inscricao->delete();
    }
	
	public function pessoa(){
		return $this->belongsTo(PessoaFisica::class, 'pessoa_fisica_id', 'id')
			->with(['cidade', 'estado']);
	}
}
