<?php

namespace App\Repositories;

use App\Models\AttributeValue as Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AttributeValueRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */

    public function findAttributeValueById(int $id)
    {
        return $this->startCondition()->where('attribute_id',$id)->toBase()->get();
    }
}
