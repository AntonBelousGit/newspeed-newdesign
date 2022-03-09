<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProductAttribute;
use App\Service\AttributeService;
use App\Service\ProductService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductAttributeController extends Controller
{
    protected $productService;
    protected $attributeService;

    public function __construct(ProductService $productService,AttributeService $attributeService)
    {
        $this->productService = $productService;
        $this->attributeService = $attributeService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadAttributes()
    {
        $attributes = $this->attributeService->getAllAttribute();
        return response()->json($attributes);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addAttribute(Request $request)
    {
        $productAttribute = ProductAttribute::create($request->data);

        if ($productAttribute) {
            return response()->json(['message' => 'Product attribute added successfully.']);
        } else {
            return response()->json(['message' => 'Something went wrong while submitting product attribute.']);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadValues(Request $request)
    {
        $attribute = $this->attributeService->findAttributeById($request->id);
        return response()->json($attribute->values);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAttribute(Request $request)
    {
        $productAttribute = $this->productService->findProductAttribute($request->id);
        $productAttribute->delete();

        return response()->json(['status' => 'success', 'message' => 'Product attribute deleted successfully.']);
    }
}
