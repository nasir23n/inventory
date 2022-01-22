<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public $fillable = [
        'full_name',
        'email',
        'address',
        'phone',
        'sallery',
        'nid',
        'joining_date',
        'profile',
    ];
}
