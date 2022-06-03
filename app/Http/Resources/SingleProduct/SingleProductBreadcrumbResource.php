<?php

namespace App\Http\Resources\SingleProduct;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SingleProductBreadcrumbResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'url'  => route('category',$this->slug),
            'categories_parent' => (isset($this->categoriesParent))? new SingleProductBreadcrumbResource($this->categoriesParent): null
        ];
    }
}
