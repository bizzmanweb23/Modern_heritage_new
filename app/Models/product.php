<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'unique_id',
        'product_name',
        'quantity',
        'price',
        'description',
        'product_image',
    ];
}
