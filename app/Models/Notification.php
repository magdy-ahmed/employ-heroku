<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;

class Notification extends Model
{
    use Notifiable;
    use HasFactory;
    protected $fillable =["name",
    "content","type","user_id","role_id"];
    protected $dates = ['created_at'];

     public function user() {

        return $this->hasOne(User::class,'id','user_id');

     }
     public function role() {
        return $this->hasOne(Role::class,'id','role_id');
     }
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
    public static function myNotification(){
        $role_id = Auth::user()->role[0]->id;
        $user_id = Auth::id();
        $notifications = self::orderBy('created_at', 'DESC')->where('role_id','=',$role_id)->
            orWhere('user_id','=',$user_id)->limit(5)->get();
        return $notifications;
    }
    public static function  countNotification(){
        $role_id = Auth::user()->role[0]->id;
        $user_id = Auth::id();
        $notifications = self::orderBy('created_at', 'DESC')->where('user_id','=',$user_id)->where('is_read','=','0')->get()->count();

        return $notifications;
    }
}
// | type       | enum('user','now-role','buy-role','sale-role','welcome-role')

