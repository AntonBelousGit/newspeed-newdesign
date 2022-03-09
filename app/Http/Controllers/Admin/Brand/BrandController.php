<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\BrandRequest;
use App\Models\Brand;
use App\Service\BrandService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class BrandController extends Controller
{

    protected $brandService;

    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $brands = $this->brandService->getAllBrand();
        return view('admin.brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BrandRequest $request
     * @return RedirectResponse
     */
    public function store(BrandRequest $request)
    {
        try {
            $this->brandService->storeBrand($request);
        } catch (Throwable $e) {
            report($e);
            abort(500);
        }
        return redirect()->route('admin.brand.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Brand $brand
     * @return Application|Factory|View
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Brand $brand
     * @return RedirectResponse
     */
    public function update(Request $request, Brand $brand)
    {
        try {
            $this->brandService->updateBrand($request, $brand);
        } catch (Throwable $e) {
            report($e);
            abort(500);
        }
        return  redirect()->route('admin.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Brand $brand
     * @return RedirectResponse
     */
    public function destroy(Brand $brand)
    {
        try {
            $this->brandService->deleteBrand($brand);
        } catch (Throwable $e) {
            report($e);
            abort(500);
        }
        return  redirect()->route('admin.brand.index');
    }
}
