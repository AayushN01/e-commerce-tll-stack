<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";

    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'description',
        'regular_price',
        'sale_price',
        'SKU',
        'stock_status',
        'featured',
        'quantity',
        'featured_image',
        'images',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
