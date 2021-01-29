<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $casts = [

        'due_date' => 'date',
    ];
    protected $fillable = [
        'T_name',
        'details',
        'due_date',
        'updated_at',
        'created_at',
    ];
}
