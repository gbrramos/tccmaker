<?php
namespace RW940cms\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'email', 'password','type','slug','media_id','curso_id'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function hasRole($role){
        return User::where('type', $role)->get();
    }
    public function media(){
        return $this->hasOne(Media::class,'id','media_id');
    }
    public function curso(){
        return $this->hasOne(Curso::class,'id','curso_id');
    }
  
}?>