<?php
namespace RW940cms\Models;
use Illuminate\Database\Eloquent\Model;
use URL;
class Logo extends Model
{
    
     protected $table = 'logo';
  
    protected $fillable = [
        'id',
        'media_id',
        'status',
       
        ];
        public function media(){
            return $this->hasOne(Media::class,'id','media_id');
        }
     
}
