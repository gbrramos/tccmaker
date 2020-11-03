<?php
namespace RW940cms\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Equipe extends Model
{
    
     protected $table = 'equipe_tcc';
  
    protected $fillable = [
        'id',
        'titulo',
        'logo_id',
        'sobre',
        'id_user',
        'integrantes',
        'curso_id',
        'login',
        'password',
        ];
        
        public function logo(){
            return $this->hasOne(Media::class,'id','logo_id');
        }

        public function curso(){
            return $this->hasOne(Curso::class,'id','curso_id');
        }

        public function user(){
            return $this->hasOne(Curso::class,'id','id_user');
        }

        protected $hidden = [
            'password', 'remember_token',
        ];
       
   
}
