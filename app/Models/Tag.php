<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable =['name','slug','img','id'];

    public function users(){
        return $this->belongsToMany(User::class,'user_tag');
    }
}
