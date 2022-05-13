<?php


namespace App\Action\Filter;

use App\Models\Product;
use Throwable;

class GetFilteredProductAction
{
    public function handle($filter)
    {
        try {
            $products = Product::filter($filter)->get();
        } catch (Throwable $e) {
            report($e);
            abort(500);
        }

        return  $products;
    }
}
