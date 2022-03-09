<?php

namespace App\Http\Controllers\Site;

use App\Action\Filter\GetFilteredProductAction;
use App\Action\Filter\SetFilterAction;
use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\Product\FilterRequest;
use Throwable;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(FilterRequest $request, SetFilterAction $action, GetFilteredProductAction $actionProduct)
    {
        try {
            $data = $request->all();
            $products = $actionProduct->handle($action->handle(ProductFilter::class, $data));
        } catch (Throwable $e) {
            report($e);
            return response()->json(['message' => $e], 500);
        }
        if ($products->count()>0) {
            return response()->json($products);
        }
        return response()->json(['message' => 'Not Found!'], 404);
    }
}
