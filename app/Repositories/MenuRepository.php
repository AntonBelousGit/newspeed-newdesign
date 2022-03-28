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
        return $this->startCondition()->orderBy('sort','desc')->whereNull('menu_id')->where('status',1)->get(['id','name']);
    }
    public function getMenuItemParentWithChildren()
    {
        return $this->startCondition()->orderBy('sort','desc')->whereNull('menu_id')->where('status',1)->with('children')->get();
    }

    public function getMenuById($id)
    {
        return $this->startCondition()->find($id);
    }
}
