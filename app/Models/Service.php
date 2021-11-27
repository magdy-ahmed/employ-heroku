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
    public function messages(){
        return $this->hasMany(Chat::class,'service_id','id');
    }
    public function messages_users(){
        return User::whereIn('id',$this->messages()->groupBy('user_id')->pluck('user_id')->all())->get();
    }
    public function is_read(){

        $data = $this->messages()->orderBy('created_at','DESC')->pluck('is_read');

        if($data->isEmpty()){
            return  true;

        }else{
            if($data->contains("0")){
                return false;
            }else{
                return true;
            }

        }
    }

}
