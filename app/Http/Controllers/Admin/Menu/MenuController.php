<?php

namespace App\Http\Controllers\Admin\Menu;

use App\Helpers\StorageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\MenuStoreRequest;
use App\Models\Menu;
use App\Service\MenuService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    private $storage;
    protected $menuService;

    public function __construct(Request $request, MenuService $menuService)
    {
        $this->menuService = $menuService;
        $menu_id = $request->route('menu');
        $this->storage = new StorageHelper('image', 'menus', $request->file('file'), Menu::find($menu_id));
    }


    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $menus = $this->menuService->getMenuItem();
        return view('admin.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $parent_menus = $this->menuService->getMenuItemParentShort();
        return view('admin.menu.create', compact('parent_menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MenuStoreRequest $request
     * @return RedirectResponse
     */
    public function store(MenuStoreRequest $request)
    {
        $data = $request->validated();

        $data['menu_id'] = $data['menu_id'] === 'parent' ? Null : $data['menu_id'];

        Menu::create($data);
        return redirect()->route('admin.menu.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Menu $menu
     * @return View
     */
    public function edit(Menu $menu)
    {
        $parent_menus = $this->menuService->getMenuItemParentShort();
        return view('admin.menu.edit', compact('parent_menus', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MenuStoreRequest $request
     * @param Menu $menu
     * @return RedirectResponse
     */
    public function update(MenuStoreRequest $request, Menu $menu)
    {
        $data = $request->validated();

        $data['menu_id'] = $data['menu_id'] === 'parent' ? Null : $data['menu_id'];

        $menu->update($data);

        return redirect()->route('admin.menu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Menu $menu
     * @return RedirectResponse
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('admin.menu.index');
    }
}
