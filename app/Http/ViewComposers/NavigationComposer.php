<?php

namespace App\Http\ViewComposers;

use App\Service\MenuService;
use Illuminate\View\View;
use App\Models\Menu;

class NavigationComposer
{

    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function compose(View $view)
    {
        $catalog = $this->menuService->getMenuItemParentWithChildren();
        return $view->with('catalog', $catalog);
    }
}
