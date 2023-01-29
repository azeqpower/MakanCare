<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
Use App\Models\Food;
Use App\Models\FoodBankRequest;
Use App\Models\Marker;
Use App\Models\Report;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
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
    ];
    
     public function foods(){
        return $this->hasMany(Food::class);
    }
    public function foodbankrequest(){
        return $this->hasMany(FoodBankRequest::class);
    }

    public function markers(){
        return $this->hasMany(Marker::class);
    }

    public function reports(){
        return $this->hasMany(Report::class);
    }

}
