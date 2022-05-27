<?php

namespace App\Http\Resources\SingleProduct;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SimilarProductsResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'short_description' => $this->short_description,
            'regular_price' => $this->regular_price,
            'sale_price' => $this->sale_price,
            'stock_status' => $this->stock_status,
            'image' => $this->image,
            'attribute' => $this->attribute,
        ];
    }
}
