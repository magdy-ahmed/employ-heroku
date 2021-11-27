<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "desc",
        "element"
    ];
}
//name "afilite-amount-1","afilite-amount-2","afilite-amount-3"
// "afilite-rate-1","afilite-rate-2","afilite-rate-3","afilite-rate-4"
//"afilite-count-users" , "special-ads-days","special-ads-amount"
//"special-ads-amount" ,"renewAuto-ads-days","renewAuto-ads-amount"
//"renewAuto-ads-hours","affiliate-expire" ,"afilite-remove-user"
