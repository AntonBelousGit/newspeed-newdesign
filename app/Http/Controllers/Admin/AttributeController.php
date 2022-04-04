<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AttributeRequest;
use App\Models\Attribute;
use App\Service\AttributeService;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Http\RedirectResponse;


class AttributeController extends Controller
{
    /**
     * @var AttributeService
     */
    protected $attributeService;

    public function __construct(AttributeService $attributeService)
    {
        $this->attributeService = $attributeService;
    }

    public function index()
    {
        $attributes = $this->attributeService->getAllAttribute();
        return view('admin.attributes.index', compact('attributes'));
    }

    public function create()
    {
        return view('admin.attributes.create');
    }

    public function store(AttributeRequest $request)
    {
        try {
            $collection = collect($request);
            $this->attributeService->storeNewAttribute($collection);
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }

        return redirect()->route('admin.attributes.index')->with(200, 'Attribute added successfully');
    }

    public function edit(Attribute $attribute)
    {

        if ($attribute === null) {
            abort(404);
        }

        return view('admin.attributes.edit', compact('attribute'));
    }


    public function editValue($id)
    {
        $attribute = $this->attributeService->findAttributeById($id);

        if ($attribute === null) {
            abort(404);
        }

        return view('admin.attributes.value.index', compact('attribute', 'id'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param AttributeRequest $request
     * @param Attribute $attribute
     * @return RedirectResponse
     */
    public function update(AttributeRequest $request, Attribute $attribute)
    {

        if ($attribute === null) {
            abort(404);
        }

        try {
            $collection = collect($request);
            $this->attributeService->updateAttribute($collection, $attribute);
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }

        return redirect()->route('admin.attributes.index')->with(200, 'Attribute updated successfully');
    }

    public function destroy(Attribute $attribute)
    {

        if ($attribute === null) {
            abort(404);
        }

        $attribute->delete();

        return redirect()->route('admin.attributes.index')->with(200, 'Attribute deleted successfully');

    }
}
