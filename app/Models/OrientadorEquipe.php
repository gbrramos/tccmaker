<?php
namespace RW940cms\Models;
use Illuminate\Database\Eloquent\Model;
use URL;
class OrientadorEquipe extends Model
{
    
     protected $table = 'orientador_equipe';
  
    protected $fillable = [
        'id',
        'equipe_id',
        'orientador_id',
    
        ];
        public function orientador(){
            return $this->hasOne(User::class,'id','orientador_id');
        }
        public function equipe(){
            return $this->hasOne(Equipe::class,'id','equipe_id');
        }
     
}
