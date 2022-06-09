<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CategoryCollection;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;

class ApiCategoryController
{

    public function get_menu(Request $request)
    {
        $categories = new CategoryCollection(Cache::remember('categories',60*60*24, function (){
            return Category::where('status', "true")
                ->where('category_id',null)
                ->where('menu','on')
                ->with('childrenCategories')
                ->get();
        }));
        return $categories;
    }
}
