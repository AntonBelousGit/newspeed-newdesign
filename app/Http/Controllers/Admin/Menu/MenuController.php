<?php

namespace App\Http\Controllers\Admin\Menu;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\MenuStoreRequest;
use App\Http\Requests\PhotoRequest;
use App\Models\Category;
use App\Models\Menu;
use App\Service\CategoryService;
use App\Service\MenuService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Throwable;

class MenuController extends Controller
{
    protected $menuService;
    protected $categoryService;

    public function __construct(MenuService $menuService, CategoryService $categoryService)
    {
        $this->menuService = $menuService;
        $this->categoryService = $categoryService;
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
        $parent_menus = $this->menuService->getMenuItem();
        $all_categories = $this->categoryService->getAllCategory();
        return view('admin.menu.create', compact('parent_menus', 'all_categories'));
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

        $parent_menu = Menu::create($data);

        if (isset($data['child_id'])) {
            foreach ($data['child_id'] as $item) {
                $cat = Category::findOrFail($item);

                $menu = new Menu;
                $menu->name = $cat->name;
                $menu->slug = $cat->slug;
                $menu->menu_id = $parent_menu->id;
                $menu->save();
            }
        }

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

        $children_menus = $this->menuService->getChildrenMenuItem($menu->id);
        $all_categories = $this->categoryService->getAllCategory();

        if (is_null($menu->menu_id)) {
            $parent_menus = $this->menuService->getMenuItemWithoutCurrent($menu->id);

            return view('admin.menu.edit', compact('parent_menus', 'menu', 'all_categories', 'children_menus'));
        }

        return view('admin.menu.child.edit', compact('menu', 'all_categories', 'children_menus'));
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

        $children_menus = $this->menuService->getChildrenMenuItem($menu->id);

        if (isset($data['child_id'])) {

            $result_new_item = array_diff($data['child_id'], $children_menus->pluck('slug')->toArray());
            $result_remove_current_item = array_diff($children_menus->pluck('slug')->toArray(), $data['child_id']);

            foreach ($result_new_item as $item) {
                $cat = Category::findOrFail($item);

                $new_menu = new Menu;
                $new_menu->name = $cat->name;
                $new_menu->slug = $cat->slug;
                $new_menu->menu_id = $menu->id;
                $new_menu->save();
            }

            foreach ($result_remove_current_item as $item) {

                $cur_menu_item = Menu::where('slug', $item)->first();

                $cur_menu_item->menu_id = Null;
                $cur_menu_item->update();
            }
        }
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


    public function addPhoto(PhotoRequest $request)
    {
        $request->validated();
        $file = $request->file('photo');
        $ext = $file->getClientOriginalExtension();
        $filename = time() . '.' . $ext;
        $file->move('assets/uploads/menu', $filename);

        return response()->json([
            'filename' => $filename,
        ]);
    }

    public function removePhoto(PhotoRequest $request)
    {
        $request->validated();

        try {
            $cat = $this->menuService->getMenuById($request->id);
            if ($cat) {
                $cat->image = null;
                $cat->save();
            }
        } catch (Throwable $e) {
            report($e);
            abort(500);
        }

        return response()->json([
            'result' => true,
            'message' => 'You have deleted image successfully'
        ]);
    }
}
