<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable =['is_read','service_id','content','user_id','for_user_id'];
    protected $dates = ['created_at'];
    use HasFactory;
    // | Field       | Type             | Null | Key | Default | Extra          |
    // +-------------+------------------+------+-----+---------+----------------+
    // | id          | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
    // | content     | text             | NO   |     | NULL    |                |
    // | created_at  | timestamp        | YES  |     | NULL    |                |
    // | updated_at  | timestamp        | YES  |     | NULL    |                |
    // | user_id     | int(10) unsigned | YES  | MUL | NULL    |                |
    // | for_user_id | int(10) unsigned | YES  | MUL | NULL    |                |
    // | service_id  | int(10) unsigned | YES  | MUL | NULL    |                |
    // +-------------+------------------+------+-----+---------+----------

    public function timeAgo(){
        $time_diff = \Carbon\Carbon::now()->diff($this->created_at);
        $format = ' منذ  %s ثانية %i دقيقة %h ساعة %d يوم %m شهر %y سنة';

        if($time_diff->format('%y') == 0){
           $format = str_replace(' %y سنة','',$format);
        }if($time_diff->format('%m') == 0){
           $format = str_replace(' %m شهر','',$format);
        }if($time_diff->format('%d') == 0){
           $format = str_replace(' %d يوم','',$format);
        }if($time_diff->format('%h') == 0){
           $format = str_replace(' %h ساعة','',$format);
       }if($time_diff->format('%i') == 0){
           $format = str_replace(' %i دقيقة','',$format);
       }if($time_diff->format('%s') == 0){
           $format = str_replace(' %s ثانية','',$format);
       }
        return $time_diff->format($format);
    }
    public function service(){
        return $this->hasOne(Service::class,'id','service_id');
    }
}
