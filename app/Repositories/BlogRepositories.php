<?php


namespace App\Repositories;

use App\Models\Blog as Model;

/**
 * Class ProductRepositories
 * @package App\Repositories
 */
class BlogRepositories extends CoreRepository
{
    /**
     * @inheritDoc
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    public function blog()
    {
        return $this->startCondition()->orderByDesc('created_at')->limit(3)->get();
    }

    public function getAllPost()
    {
        return $this->startCondition()->orderByDesc('created_at')->get();
    }

    public function getPostById($id)
    {
        return $this->startCondition()->find($id);
    }

}
