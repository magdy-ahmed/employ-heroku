<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    use HasFactory;
    protected $table ='financial';
    protected $fillable = [
        'user_id',
        'positive',
        'amount',
        'type',
        'order_id',
        'affiliate_id'
    ];
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function order(){
        return $this->hasOne(Order::class,'id','order_id');
    }
    public function affiliate(){
        return $this->hasOne(Affiliate::class,'id','affi;iate_id');
    }
    public function profile(){
        return $this->hasOne(Profile::class,'user_id','user_id');
    }
}
