<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryByNameRequest;
use App\Http\Requests\Category\SearchChildrenByParantIdRequest;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\PhotoRequest;
use App\Http\Resources\CategoryChildrenResource;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Service\CategoryService;
use Throwable;

class CategoryController extends Controller
{

    /**
     * @var CategoryService
     */
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->getAllParentCategory();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = $this->categoryService->getAllCategory();
        return view('admin.categories.create', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        try {
            $validated_data = collect($request);
            $this->categoryService->storeCategory($validated_data);
        } catch (Throwable $e) {
            report($e);
            abort(500);
        }
        return redirect()->route('admin.categories.index')->with('status', 'Категория была успешно создана');
    }

    public function edit(Category $category)
    {
        $categories = $this->categoryService->getAllCategoryWithoutCurentID($category->id);
        return view('admin.categories.edit', compact('categories', 'category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $validated_data = collect($request);
            $this->categoryService->updateCategory($validated_data, $category);
        } catch (Throwable $e) {
            report($e);
            abort(500);
        }
        return redirect()->route('admin.categories.index')->with('status', 'Категория обновлена');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('status', 'Категория обновлена');
    }

    public function addPhoto(PhotoRequest $request)
    {
        $request->validated();
        $file = $request->file('photo');
        $ext = $file->getClientOriginalExtension();
        $filename = time() . '.' . $ext;
        $file->move('assets/uploads/category', $filename);

        return response()->json([
            'filename' => $filename,
        ]);
    }

    public function removePhoto(PhotoRequest $request)
    {
        $request->validated();

        try {
            $cat = $this->categoryService->getCategoryById($request->id);
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

    public function searchByName(CategoryByNameRequest $request)
    {
        $data = $request->validated();
        $categories = $this->categoryService->getCategoryByName($data['search']);
        return CategoryResource::collection($categories);
    }

    public function searchChildrenByParent(SearchChildrenByParantIdRequest $request)
    {
        $data = $request->validated();
        $categories = $this->categoryService->searchChildrenByParent($data['id']);

        return CategoryChildrenResource::collection($categories);
    }
}
