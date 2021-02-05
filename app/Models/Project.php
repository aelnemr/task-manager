<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'manager_id',
        'name',
        'image',
        'description',
        'status'
    ];

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

//    public function getManagerAttribute()
//    {
//        return $this->manager()->first();
//    }
}
