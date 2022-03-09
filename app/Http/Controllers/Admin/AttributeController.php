<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AttributeRequest;
use App\Models\Attribute;
use App\Service\AttributeService;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Doctrine\Instantiator\Exception\InvalidArgumentException;


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

    public function edit($id)
    {
        $attribute = $this->attributeService->getEdit($id);

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

        return view('admin.attributes.value.index', compact('attribute','id'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AttributeRequest $request, $id)
    {
        $attribute = $this->attributeService->getEdit($id);

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

    public function delete($id)
    {
        $attribute = $this->attributeService->getEdit($id);

        if ($attribute === null) {
            abort(404);
        }

        $attribute->delete();

        return redirect()->route('admin.attributes.index')->with(200, 'Attribute deleted successfully');

    }
}
