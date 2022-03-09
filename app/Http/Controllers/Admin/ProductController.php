<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Service\AttributeService;
use App\Service\BrandService;
use App\Service\CategoryService;
use App\Service\ProductService;
use Illuminate\Http\Request;
use Throwable;


class ProductController extends Controller
{
    protected $productService;
    protected $attributeService;
    protected $categoryService;
    protected $brandService;

    public function __construct(ProductService $productService, CategoryService $categoryService, AttributeService $attributeService,BrandService $brandService)
    {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
        $this->attributeService = $attributeService;
        $this->brandService = $brandService;

    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $products = $this->productService->getProductWithCategory();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.*
     */
    public function create()
    {
        $categories = $this->categoryService->getAllCategory();
        $attributes = $this->attributeService->getAttributeApi();
        $brands = $this->brandService->getAllBrand();
        return view('admin.products.create', compact('categories', 'attributes','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(ProductRequest $request)
    {
        try {
            $validated_data = collect($request);
            $product = $this->productService->storeProduct($validated_data);

            if (isset($validated_data['state'])) {
                $state = $validated_data['state'];
                $addAttribute = $validated_data['addAttribute'] ?? [];
                $this->attributeService->storeProductAttribute($product, $state, $addAttribute);
            }
        } catch (Throwable $e) {
            report($e);
            abort(500);
        }
        return redirect()->route('admin.products.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        $categories = $this->categoryService->getAllCategory();
        $brands = $this->brandService->getAllBrand();
        $product = $this->productService->getProductWithAttributeByID($id);
        return view('admin.products.edit', compact('product', 'categories','brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(ProductRequest $request, $id)
    {
        $product = $this->productService->getProductByID($id);

        try {
            $validated_data = collect($request);
            $this->productService->updateProduct($validated_data, $product);
        } catch (Throwable $e) {
            report($e);
            abort(500);
        }

        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     */
    public function destroy($id)
    {
        $product = $this->productService->getProductByID($id);
        $product->delete();
        return redirect()->route('admin.products.index');
    }

    public function addPhoto(PhotoRequest $request)
    {
        //dd($request);
        $request->validated();
        $file = $request->file('photo');
        $ext = $file->getClientOriginalExtension();
        $filename = time() . '.' . $ext;
        $file->move('assets/uploads/products', $filename);

        return response()->json([
            'filename' => $filename,
        ]);
    }

    public function removePhoto(PhotoRequest $request)
    {
        $request->validated();
        $product = $this->productService->getProductByID($request->product_id);
        $images = json_decode($product->images);
        $filename = $request->name;

        foreach ($images as $idx => $photo) {
            if ($photo === $filename) {
                $search_index = $idx;
                break;
            }
        }
        unset($images[$search_index]);

        $product->images = json_encode(array_values($images));
        $product->save();

        return response()->json([
            'result' => true,
            'message' => 'You have deleted image successfuly'
        ]);
    }

    public function move_product_to_block(Request $request)
    {
        $data = $this->validate($request, [
            'id' => '',
            'block' => '',
        ]);
        $event = Product::move_product_to_block($data);
        return response()->json([
            'result' => $event,
        ]);
    }

    public function delete_product_from_block(Request $request)
    {

    }
}
