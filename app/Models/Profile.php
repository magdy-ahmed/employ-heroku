<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
// use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;
class Profile extends Model
{
    use HasFactory;
    // use HasTrixRichText;

    // protected $guarded = [];
    protected $fillable = ['content','img','title','slug','code'];
    public function user(){
        return $this->hasOne(User::class, 'id','user_id');
    }
    public function category(){
        return $this->hasOne(Category::class, 'id');
    }
    public function tags(){
        return $this->belongsToMany(Tag::class, 'user_tag','user_id');
    }
    public function places(){
        return $this->hasMany(Place::class,'user_id','user_id');
    }
    public function services(){
        return $this->hasMany(Service::class,'user_id','user_id');
    }
    // public function referred()
    // {
    //     return $this->hasMany(self::class, 'referred_by', 'affiliate_tag');
    // }
}
