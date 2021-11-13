<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable =[
       'title',
       'slug',
       'content' ,
       'excerpt',
       'img',
       'salery',
       'discount',
       'user_id',
       'status',
       'place_id'
    ];
    use HasFactory;
    public function profile(){
        return $this->hasOne(Profile::class, 'user_id','user_id');
    }
    public function user(){
        return $this->hasOne(User::class, 'id','user_id');
    }
    public function place(){
        return $this->belongsTo(Place::class,'place_id','id');
    }
    public function tags(){
        return $this->belongsToMany(Tag::class,'user_tag','user_id','user_id');
    }
    public function category(){
        return $this->hasOne(Category::class,'user_id','user_id');
    }
}
