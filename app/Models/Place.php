<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    protected $fillable = ['name','content','excerpt','openAt','closeAt','phone',
        'daysClose','country','city','location','address','img','status','user_id'];
    public function user(){
        return $this->hasOne(User::class, 'id','user_id');
    }
    public function profile(){
        return $this->hasOne(Profile::class, 'user_id','user_id');
    }
    public function services(){
        return $this->hasMany(Service::class,'place_id','id');
    }
}
