<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

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
        'phone',
        'email',
        'password',
        'is_active'
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
        'is_active' => 'boolean'
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function getPhoneAttribute()
    {
        return $this->attributes['phone'] ?? '';
    }

    public function getCreatedFromAttribute()
    {
        return $this->attributes['created_at'] ? $this->created_at->diffForHumans() : '';
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_from' => $this->created_at ? $this->created_at->diffForHumans() : ""
        ];
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'manager_id');
    }
}
