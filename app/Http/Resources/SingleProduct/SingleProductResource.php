<?php

namespace App\Http\Resources\SingleProduct;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SingleProductResource extends JsonResource
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
            'short_description' => $this->short_description,
            'description' => $this->description,
            'seo_description' => $this->seo_description,
            'regular_price' => $this->regular_price,
            'sale_price' => $this->sale_price,
            'sku' => $this->SKU,
            'stock_status' => $this->stock_status,
            'images' => array_merge(json_decode($this->images),array($this->image)) ,
            'attribute' => $this->attribute,
        ];
    }
}
