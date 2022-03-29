<?php


namespace App\Repositories;

use App\Models\Category as Model;
use Carbon\Carbon;

/**
 * Class ProductRepositories
 * @package App\Repositories
 */
class CategoryRepositories extends CoreRepository
{
    /**
     * @inheritDoc
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    public function popcat()
    {
        return $this->startCondition()->where('popular', 'on')->limit(10)->get();
    }

    public function getAllCategory()
    {
        return $this->startCondition()->orderByDesc('created_at')->get(['id', 'name']);
    }

    public function getAllCategoryWithoutCurentID($id)
    {
        return $this->startCondition()->where('id', '!=', $id)->get();
    }
    public function getAllParentCategory()
    {
        return $this->startCondition()->whereNull('category_id')->get();
    }
    public function getCategoryWithChildrenBySlug($slug)
    {
        return $this->startCondition()->where('slug', $slug)->with('childrenCategories')->first();
    }

    public function getCategoryById($id)
    {
        return $this->startCondition()->find($id);
    }

    public function getCategoryByName($name)
    {
        return $this->startCondition()->where('name','like','%'.$name.'%')->get(['name','slug']);
    }

    public function searchChildrenByParent($id)
    {
        return $this->startCondition()->where('category_id',$id)->get(['id','name','slug']);
    }

    public function getCategoryWithParent()
    {
        return $this->startCondition()->with('categoriesParent')->orderByDesc('created_at')->get();
    }

    public function getCategoryWithChildren()
    {
        return $this->startCondition()->with('childrenCategories.childrenCategories')->orderByDesc('created_at')->get();
    }

}
