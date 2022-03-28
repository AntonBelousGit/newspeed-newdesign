<?php


namespace App\Service;


use App\Models\Menu;
use App\Repositories\MenuRepository;


class MenuService
{
    protected $menuRepository;

    public function __construct(MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    public function getMenuItem()
    {
        return $this->menuRepository->getMenuItem();
    }
    public function getMenuById($id)
    {
        return $this->menuRepository->getMenuById($id);
    }

    public function getMenuItemParentShort()
    {
        return $this->menuRepository->getMenuItemParentShort();
    }
    public function getMenuItemParentWithChildren()
    {
        return $this->menuRepository->getMenuItemParentWithChildren();
    }
}
