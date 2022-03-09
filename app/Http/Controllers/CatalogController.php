<?php

namespace App\Http\Controllers;

use App\Action\Filter\GetFilteredProductAction;
use App\Action\Filter\SetFilterAction;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\Product\FilterRequest;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use App\Service\AttributeService;
use App\Service\BrandService;
use App\Service\ProductService;
use Illuminate\Http\Request;

class CatalogController extends Controller
{

    protected $productService;
    protected $attributeService;
    protected $brandService;

    public function __construct(ProductService $productService, AttributeService $attributeService, BrandService $brandService)
    {
        $this->productService = $productService;
        $this->attributeService = $attributeService;
        $this->brandService = $brandService;
    }

    public function category(Category $category, FilterRequest $request, SetFilterAction $action, GetFilteredProductAction $actionProduct)
    {
        $data = $request->all();
        $data['category_id'] = $category->id;
        $products = $actionProduct->handle($action->handle(ProductFilter::class, $data));

        if ($category->childrenCategories->count()) {
            return view('frontend.category.child-category.page-category', compact('category'));
        }

        $brands = $this->brandService->getAllBrand();
        $filter_attribute = Attribute::with('values')->get();
        return view('frontend.category.page-category-one', compact('products', 'category','filter_attribute','brands'));
    }

    public function product($slug)
    {
        $product = $this->productService->getProductWithAttributeBySLUG($slug);
        $attributes = $product->hasManyAttributes ?? [];
        $similar_products = $this->productService->similarProducts($product->category_id, $product->id);
        return view('frontend.product.index', compact('product', 'attributes', 'similar_products'));
    }
}
