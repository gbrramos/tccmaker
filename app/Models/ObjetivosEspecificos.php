<?php
namespace RW940cms\Models;
use Illuminate\Database\Eloquent\Model;
use URL;
class ObjetivosEspecificos extends Model
{
    
     protected $table = 'objetivos_especificos';
  
    protected $fillable = [
        'id',
        'documentacao_id',
        'descricao',
    
        ];
        public function equipe(){
            return $this->hasOne(Equipe::class,'id','equipe_id');
        }
    
}
