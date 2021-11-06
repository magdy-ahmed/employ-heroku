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
    protected $fillable = ['content','img','title','slug'];
    public function user(){
        return $this->hasOne(User::class, 'id');
    }
    public function category(){
        return $this->hasOne(Category::class, 'id');
    }
    public function tags(){
        return $this->belongsToMany(Tag::class, 'user_tag','user_id');
    }
}
