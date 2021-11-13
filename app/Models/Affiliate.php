<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    use HasFactory;
    protected $table ='affiliate';
    protected $fillable = [
        "user_id",
        "tag",
        "referral",
        "expire_at"
    ];
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function profile(){
        return $this->hasOne(Profile::class,'user_id','user_id');
    }
}
