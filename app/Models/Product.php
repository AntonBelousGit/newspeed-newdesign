<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use Filterable;

    protected $table = "products";
    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'description',
        'seo_description',
        'regular_price',
        'sale_price',
        'SKU',
        'stock_status',
        'featured',
        'quantity',
        'image',
        'images',
        'category_id',
        'brand_id',
        'attribute'
    ];

    protected $casts = [
        'attribute' => 'array'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Block::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(ProductAttribute::class, 'product_attributes', 'product_id', 'attribute_id');
    }

    public function hasManyAttributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function att()
    {
        return $this->hasManyThrough(ProductAttribute::class, Attribute::class);
    }
}
