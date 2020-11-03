<?php
namespace RW940cms\Models;
use Illuminate\Database\Eloquent\Model;
use URL;
class Documentacao extends Model
{
    
     protected $table = 'documentacao_tcc';
  
    protected $fillable = [
        'id',
        'equipe_id',
        'introducao',
        'resumo',
        'objetivo_geral',

       
        ];
        public function equipe(){
            return $this->hasOne(Equipe::class,'id','equipe_id');
        }
     
}
