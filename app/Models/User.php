<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Address;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject {
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public static function boot() {
        parent::boot();

        static::creating(function($user) {
            $user->password = bcrypt($user->password);
        });
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * @return [type] [description]
     */
    public function getJWTIdentifier() {
        return $this->id;
    }

    /**
     * @return [type] [description]
     */
    public function getJWTCustomClaims() {
        return [];
    }

    public function cart() {
        return $this->belongsToMany(ProductVariation::class, 'cart_user')
        ->withPivot('quantity')
        ->withTimestamps();
    }

    public function addresses() {
        return $this->hasMany(Address::class);
    }
}
