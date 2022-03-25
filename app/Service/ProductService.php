<?php


namespace App\Service;

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Repositories\AttributeRepository;
use App\Repositories\AttributeValueRepository;
use App\Repositories\ProductAttributeRepository;
use App\Repositories\ProductRepositories;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class ProductService
{

    protected $productAttributeRepository;
    protected $productRepositories;

    public function __construct(ProductAttributeRepository $productAttributeRepository, ProductRepositories $productRepositories)
    {
        $this->productAttributeRepository = $productAttributeRepository;
        $this->productRepositories = $productRepositories;

    }

    public function getProductByID(int $id)
    {
        return $this->productRepositories->getProductByID($id);
    }
    public function getProductWithAttributeByID(int $id)
    {
        return $this->productRepositories->getProductWithAttributeByID($id);
    }

    public function getProductWithAttributeBySLUG(string $slug)
    {
        return $this->productRepositories->getProductWithAttributeBySLUG($slug);
    }

    public function getAllAttribute()
    {
        return $this->productAttributeRepository->getProductAttribute();
    }

    public function findProductAttribute(int $id)
    {
        return $this->productAttributeRepository->findProductAttribute($id);
    }

    public function similarProducts($cat_id, $prod_id)
    {
        return $this->productRepositories->similarProducts($cat_id, $prod_id);
    }

    public function getProductWithCategory()
    {
        return $this->productRepositories->getProductWithCategory();
    }

    public function storeProduct($data)
    {

        $slug = $data->has('slug') ? $data['slug'] : Str::slug($data['name'] . '-' . Carbon::now()->toDateTimeString(), '-');
        $featured = (bool)$data->has('featured');
        $images = null;
        if (isset($data['photos'])) {
            $images = json_encode(array_values($data['photos']), JSON_THROW_ON_ERROR);
        }
        $data->forget(['photos', 'file']);
        $newProduct = $data->except(['state', 'addAtribut']);
        $merge = $newProduct->merge(compact('slug', 'featured', 'images'));
        $product = (new Product())->create($merge->toArray());
        $product->save();

        return $product;
    }

    /**
     */
    public function updateProduct($data, $product)
    {
//        dd($data);
        $featured = (bool)$data->has('featured');
        $image = $data['image'] ?? null;
        $images = $product->images;
        if (isset($data['photos'])) {
            $gallery = $data['gallery'] ?? [];
            $images = json_encode(array_values(array_merge_recursive($gallery, $data['photos'])));
        }
        $data->forget(['gallery']);
        $merge = $data->merge(compact('image', 'featured', 'images'));
        $product->fill($merge->toArray());
        $product->update();

        return true;
    }


}
