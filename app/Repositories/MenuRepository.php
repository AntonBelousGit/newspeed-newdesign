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
    public function getMenuItemParentShort()
    {
        return $this->startCondition()->orderBy('sort','desc')->whereNull('menu_id')->get(['id','name']);
    }
    public function getMenuItemParentWithChildren()
    {
        return $this->startCondition()->orderBy('sort','desc')->whereNull('menu_id')->with('children')->get();
    }
}
