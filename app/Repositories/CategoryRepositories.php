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

    public function getCategoryById($id)
    {
        return $this->startCondition()->find($id);
    }

    public function getCategoryWithParent()
    {
        return $this->startCondition()->with('categoriesParent')->orderByDesc('created_at')->get();
    }
}
