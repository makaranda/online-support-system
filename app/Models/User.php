<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function is_super_admin(){
        return $this->usertype_id == 1 ? true : false ;
    }

    public function is_admin(){
        return $this->usertype_id == 2 ? true : false ;
    }

    public function is_manager(){
        return $this->usertype_id == 3 ? true : false ;
    }

    public function is_technical(){
        return $this->usertype_id == 4 ? true : false ;
    }

    public function is_call_center(){
        return $this->usertype_id == 5 ? true : false ;
    }
}
