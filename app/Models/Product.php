<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'original_price',
        'selling_price',
        'image',
        'qty',
        'status',
    ];

  // public function category()
  // {
  //    return $this->belongsTo(Category::class, 'cate_id', 'id');
  // }
}

