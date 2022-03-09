<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\AttributeValueRepository;
use App\Service\AttributeService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Throwable;

class AttributeValueController extends Controller
{
    /**
     * @var AttributeService
     * @var AttributeValueRepository
     */
    protected $attributeService;

    public function __construct(AttributeService $attributeService)
    {
        $this->attributeService = $attributeService;
    }
    public function getAttributeApi()
    {
        try {
            $attribute = $this->attributeService->getAttributeApi();
        }catch (Throwable $e)
        {
            report($e);
            return response()->json(['message' => 'Not Found!'], 404);
        }
        return response()->json($attribute);
    }


    public function getValues(Request $request)
    {
        try {
            $attribute = $this->attributeService->findAttributeValueById($request->id);
        }catch (Throwable $e)
        {
            report($e);
            return response()->json(['message' => 'Not Found!'], 404);
        }
        return response()->json($attribute);
    }

    public function addValues(Request $request, $id)
    {
        $values = $request->input('value');

        try {
            $this->attributeService->addAttributeValue($values, $id);
        } catch (Throwable $e) {
            report($e);
            abort(500);
        }

        return back()->with(200, 'Attribute value deleted successfully.');
    }

    public function deleteValues($id)
    {
        $attributeValue = $this->attributeService->findAttributeValueById($id);

        if ($attributeValue === null) {
            abort(404);
        }

        $attributeValue->delete();

        return back()->with(200, 'Attribute value deleted successfully.');
    }
}
