<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Permissions\HasPermissions;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasPermissions,SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'phone',
        'password',
        'profile_id'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsToMany(Role::class,'users_roles');
    }

    public function profile(){
        return $this->hasOne(Profile::class,'user_id','id');
    }
    public function places(){
        return $this->hasMany(Place::class,'user_id','id');
    }
    public function services(){
        return $this->hasMany(Service::class,'user_id','id');
    }
    public function tags(){
        return $this->belongsToMany(Tag::class,'user_tag');
    }
    public function affiliates(){
        return $this->hasMany(Affiliate::class,'user_id','id');
    }
}
