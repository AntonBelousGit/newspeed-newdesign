<?php


namespace App\Service;


use App\Models\Category;
use App\Repositories\CategoryRepositories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class CategoryService
{
    protected $categoryRepositories;

    public function __construct(CategoryRepositories $categoryRepositories)
    {
        $this->categoryRepositories = $categoryRepositories;

    }

    public function getAllCategory(){
        return $this->categoryRepositories->getAllCategory();
    }

    public function getCategoriesWithParent()
    {

        return $this->categoryRepositories->getCategoryWithParent();
    }

    public function getCategoryById($id) {
        return $this->categoryRepositories->getCategoryById($id);
    }
    public function getCategoryWithChildrenBySlug($slug){
        return $this->categoryRepositories->getCategoryWithChildrenBySlug($slug);
    }

    public function storeCategory($validated_data)
    {
        $category_id = $validated_data['category_id'] === 'null' ? null : $validated_data['category_id'];
        $recomend = $validated_data->has('recomend') ? 'on' : null;
        $popular = $validated_data->has('popular') ? 'on' : null;
        $merge = $validated_data->merge(compact('category_id','recomend','popular'));
        $category = (new Category())->create($merge->toArray());
        $category->save();
        return true;
    }
    public function updateCategory($validated_data,$category)
    {
        $category_id = $validated_data['category_id'] === 'null' ? null : $validated_data['category_id'];
        $recomend = $validated_data->has('recomend') ? 'on' : null;
        $popular = $validated_data->has('popular') ? 'on' : null;
        $merge = $validated_data->merge(compact('category_id','recomend','popular'));
        $category->fill($merge->toArray());
        $category->update();
        return true;
    }

    public function getAllCategoryWithoutCurentID($id)
    {
        return $this->categoryRepositories->getAllCategoryWithoutCurentID($id);
    }

    public function getCategoryByName($name)
    {
        return $this->categoryRepositories->getCategoryByName($name);
    }

    public function save_category_image($request)
    {
//        dd($request);
        $image = $request->hashName();
        $request->storePublicly('public/images/category');

        return $image;
    }
}
