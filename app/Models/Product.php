<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'code',
        'category_id',
        'supplier_id',
        'root',
        'buying_price',
        'selling_price',
        'quantity',
        'buying_date',
        'image',
    ];
}
