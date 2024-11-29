<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{

    protected $with = ['user:id,name,image','coments.user:id,name,image'] ;

    // protected $guarded = ['id'];

    protected $fillable = [
        'user_id' ,
        'content'
    ] ;

    use HasFactory;

    //melakukan relationship
    public function coments(){
        return $this->hasMany(Coment::class) ;
    }

    public function user(){
        return $this->belongsTo(User::class) ;
    }


    public function likes(){
        return $this->belongsToMany(User::class,'idea_like')->withTimestamps();
    }



}
