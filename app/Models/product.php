<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'product_title',
        'product_description',
        'product_price',
        'product_quantity',
        'product_category',
        'product_image',
    ];
}
