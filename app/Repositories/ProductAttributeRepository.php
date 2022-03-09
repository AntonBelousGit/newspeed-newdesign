<?php

namespace App\Repositories;

use App\Models\ProductAttribute as Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductAttributeRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function findProductAttribute(int $id)
    {
        return $this->startCondition()->find($id);
    }

    public function getProductAttribute(): Collection|array
    {
        return $this->startCondition()->with('attribute')->get();
    }
}
