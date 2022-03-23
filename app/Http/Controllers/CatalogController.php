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
use App\Service\CategoryService;
use App\Service\ProductService;
use Illuminate\Http\Request;

class CatalogController extends Controller
{

    protected $productService;
    protected $attributeService;
    protected $brandService;
    protected $categoryService;

    public function __construct(ProductService $productService, AttributeService $attributeService, BrandService $brandService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->attributeService = $attributeService;
        $this->brandService = $brandService;
        $this->categoryService = $categoryService;
    }

    public function category($slug, FilterRequest $request, SetFilterAction $action, GetFilteredProductAction $actionProduct)
    {
        $data = $request->all();

        $category = $this->categoryService->getCategoryWithChildrenBySlug($slug);

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
