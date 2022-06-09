<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'image' => $this->image,
            'icon' => $this->icon,
            'category_id' => $this->category_id,
            'childrenCategories' => Category::where('status', "true")
                ->where('category_id',$this->id)
//                ->where('menu','on')
                ->with('childrenCategories:id,category_id,name,slug,image,icon')
                ->select('id','category_id','name','slug','image','icon')
                ->get(),

        ];
    }
}
