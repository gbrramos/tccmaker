<?php
namespace RW940cms\Models;
use Illuminate\Database\Eloquent\Model;
use URL;
class ComentariosProfessor extends Model
{
    
     protected $table = 'comentarios_professor';
  
    protected $fillable = [
        'id',
        'documentacao_id',
        'comentario',
        'nota',
        'autor_id',
        'created'
        ];  

        public function doc(){
            return $this->hasOne(Documentacao::class,'id','documentacao_id');
        }

        public function autor(){
            return $this->hasOne(User::class,'id','autor_id');
        }
    
}
