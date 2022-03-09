<?php


namespace App\Repositories;

use App\Models\Brand as Model;

/**
 * Class ProductRepositories
 * @package App\Repositories
 */
class BrandRepositories extends CoreRepository
{
    /**
     * @inheritDoc
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllBrand()
    {
        return $this->startCondition()->orderByDesc('created_at')->get(['id', 'name']);
    }

    public function getBrandById($id)
    {
        return $this->startCondition()->find($id);
    }

}
