<?php

namespace App\Repositories;

use App\Models\Menu as Model;

class MenuRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getMenuItem()
    {
        return $this->startCondition()->orderBy('sort','desc')->get();
    }
}
