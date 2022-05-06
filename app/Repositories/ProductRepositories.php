<?php


namespace App\Repositories;

use App\Models\Product as Model;
use Carbon\Carbon;

/**
 * Class ProductRepositories
 * @package App\Repositories
 */
class ProductRepositories extends CoreRepository
{
    /**
     * @inheritDoc
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * @throws \Exception
     */
    public function featured()
    {
        $featured = cache()->remember('featured-product', 60 * 60 * 24, function () {
            return $this->startCondition()->where('featured', 1)->limit(8)->toBase()->get()->toArray();
        });
        return $featured;
    }

    public function services()
    {
        return true;
    }

    /**
     * @throws \Exception
     */
    public function promotions()
    {
        $promotions = cache()->remember('promotions-product', 60 * 60 * 24, function () {

            return $this->startCondition()->whereRaw('products.regular_price > products.sale_price')->limit(6)->toBase()->get()->toArray();
        });
        return $promotions;

    }

    /**
     * @throws \Exception
     */
    public function new_product()
    {
        $new_product = cache()->remember('new_product', 60 * 60 * 24, function () {

            return $this->startCondition()->orderBy('created_at', 'desc')->limit(6)->toBase()->get()->toArray();

        });
        return $new_product;
    }

    public function similarProducts($cat_id,$prod_id)
    {
        $product = $this->startCondition()->where('category_id', $cat_id)->where('id','!=',$prod_id)->toBase()->get();

        if (count($product) > 6) {
            return $product->random(6);
        }
        return $product;
    }

    public function getProductByID($id)
    {
        return $this->startCondition()->find($id);
    }

    public function getProductWithCategory()
    {
        return $this->startCondition()->with('category')->get();
    }

    public function getProductWithAttributeByID($id)
    {
        return $this->startCondition()->with('hasManyAttributes.productAttributeValue','hasManyAttributes.attribute')->find($id);
    }
    public function getProductWithAttributeBySLUG($slug)
    {
//        return $this->startCondition()->with('hasManyAttributes.productAttributeValue','hasManyAttributes.attribute')->where('slug',$slug)->first();
        return $this->startCondition()->where('slug',$slug)->first();
    }
}
