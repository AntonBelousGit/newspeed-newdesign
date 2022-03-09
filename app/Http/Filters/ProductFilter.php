<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const CATEGORY_ID = 'category_id';
    public const PRICE = 'price';
    public const BRAND = 'brand_id';

    protected function getCallbacks(): array
    {
        return [
            self::NAME =>[$this,'name'],
            self::CATEGORY_ID =>[$this,'categoryId'],
            self::BRAND =>[$this,'brandId'],
            self::PRICE =>[$this,'priceBetween'],
        ];
    }

    public function name(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%");
    }

    public function categoryId(Builder $builder, $value)
    {
        $builder->where('category_id', $value);
    }

    public function brandId(Builder $builder, $value)
    {
        $builder->where('brand_id', $value);
    }

    public function priceBetween(Builder $builder, $value)
    {
        $builder->whereBetween('sale_price', $value);
    }
}
