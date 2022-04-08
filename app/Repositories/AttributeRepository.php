<?php

namespace App\Repositories;

use App\Models\Attribute as Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AttributeRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * @return Model
     */
    public function getAttribute()
    {
        return $this->startCondition()->orderBy('name', 'desc')->get();
    }
    public function getAttributeApiWithValue()
    {
        return $this->startCondition()->orderBy('name', 'desc')->with('values')->get();
    }
    /**
     * @return Model
     */
    public function getAttributeApi()
    {
        return $this->startCondition()->orderBy('name', 'desc')->get(['id','name','code']);
    }

    /**
     * @param int $id
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startCondition()->find($id);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findAttributeById(int $id)
    {
        return $this->startCondition()->with('values')->findOrFail($id);
    }

    public function findAttributeValueByCode($code)
    {
        return $this->startCondition()->with('values')->where('code',$code)->first();
    }

}
