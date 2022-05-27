<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Action\Filter\GetFilteredProductAction;
use App\Action\Filter\SetFilterAction;
use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\Product\FilterRequest;
use App\Http\Resources\Menu\MenuCatalogResources;
use App\Http\Resources\SingleProduct\SimilarProductsResource;
use App\Http\Resources\SingleProduct\SingleProductResource;
use App\Models\Attribute;
use App\Models\Category;
use App\Service\AttributeService;
use App\Service\BlockService;
use App\Service\BrandService;
use App\Service\CategoryService;
use App\Service\ProductService;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;

class ApiCatalogController extends Controller
{
    use ApiResponser;

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

    public function menu()
    {
        $catalog = Category::whereNull('category_id')->where('status', "true")->orderBy('sort', 'asc')
            ->with('childrenCategories', function ($q) {
                $q->orderBy('sort', 'asc')->where('status', "true")
                    ->with('childrenCategories', function ($j) {
                        $j->orderBy('sort', 'asc')->with('childrenCategories')->where('status', "true");
                    });
            })->get();

        if (!$catalog) {
            return $this->error('Not found', 404);
        }

        return MenuCatalogResources::collection($catalog);
    }


    public function block(BlockService $blockService)
    {
        $blocks = $blockService->getBlocks();

        if (!$blocks) {
            return $this->error('Not found', 404);
        }

        return new JsonResponse([$blocks]);
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

        return view('frontend.category.page-category-one', compact('products', 'category', 'filter_attribute', 'brands'));
    }

    public function product($slug)
    {
        $product = $this->productService->getProductWithAttributeBySLUG($slug) ?? [];

        if (!$product) {
            return $this->error('Not found', 404);
        }

        $similar_products = $this->productService->similarProducts($product->category_id, $product->id);

        return new JsonResponse(['data' => ['product' => new SingleProductResource($product), 'similar_products' => SimilarProductsResource::collection($similar_products)]]);
    }
}
