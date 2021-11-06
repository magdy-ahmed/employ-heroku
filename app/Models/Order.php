<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function users() {

        return $this->belongsToMany(User::class,'orders');

     }
    public function sevices() {

        return $this->belongsTo(Service::class,'orders');

     }
}
