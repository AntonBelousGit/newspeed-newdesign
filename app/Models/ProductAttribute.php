<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'product_attributes';
    /**
     * @var array
     */
    protected $fillable = ['attribute_id', 'product_id','price_prefix','attribute_value_id', 'value', 'quantity', 'price','position'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function productAttributeValue()
    {
        return $this->belongsToMany(
            AttributeValue::class,
            'attribute_value_product_attribute',
            'product_attribute_id',
            'attribute_value_id'
        );
    }
}
