<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'role_id',
        'phone_muber',
        'password',
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //fonction de mise en relation user-produits
    public function produits()
    {
        return $this->belongsToMany(Produit::class);
    }

    public function routeNotificationForNexmo($notification)
    {
        return $this->phone_number;
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function isAdmin()
    {
       if ($this->role->role=='admin' OR $this->role->role=='super-admin')
       return true;
       else
       return false;
    }
    
}
