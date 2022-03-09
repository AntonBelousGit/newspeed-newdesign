<?php


namespace App\Service;

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\ProductAttribute;
use App\Repositories\AttributeRepository;
use App\Repositories\AttributeValueRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;


class AttributeService
{

    protected $attributeRepository;
    protected $attributeValueRepository;

    public function __construct(AttributeRepository $attributeRepository, AttributeValueRepository $attributeValueRepository)
    {
        $this->attributeRepository = $attributeRepository;
        $this->attributeValueRepository = $attributeValueRepository;
    }

    public function getAllAttribute()
    {
        return $this->attributeRepository->getAttribute();
    }

    public function getAttributeApi()
    {
        return $this->attributeRepository->getAttributeApi();
    }

    public function getEdit($id)
    {
        return $this->attributeRepository->getEdit($id);
    }

    public function findAttributeById($id)
    {
        return $this->attributeRepository->findAttributeById($id);
    }

    public function findAttributeValueById($id)
    {
        return $this->attributeValueRepository->findAttributeValueById($id);
    }

    public function storeNewAttribute($collection)
    {
        $is_filterable = $collection->has('is_filterable') ? 1 : 0;
        $is_required = $collection->has('is_required') ? 1 : 0;
        $merge = $collection->merge(compact('is_filterable', 'is_required'));
        $attribute = (new Attribute())->create($merge->toArray());
        $attribute->save();
        return $attribute;
    }

    public function updateAttribute($collection, $attribute)
    {

        $is_filterable = $collection->has('is_filterable') ? 1 : 0;
        $is_required = $collection->has('is_required') ? 1 : 0;
        $merge = $collection->merge(compact('is_filterable', 'is_required'));
        $attribute->update($merge->all());
        return $attribute;
    }

    public function addAttributeValue($values, $id)
    {
        foreach ($values as $item) {
            $attributeValue = new AttributeValue;
            $attributeValue->attribute_id = $id;
            $attributeValue->value = $item;
            $attributeValue->save();
        }
    }

    public function storeProductAttribute($product, $addAttribute, $createAttributeValue)
    {
        foreach ($addAttribute as $key => $item) {
            $newProductAttribute = ProductAttribute::create(['product_id' => $product->id, 'attribute_id' => $key]);
            foreach ($item as $value) {
                if ($value == 'Add') {
                    $value = AttributeValue::create(['attribute_id' => $key, 'value' => array_shift($createAttributeValue[$key])]);
                }
                $newProductAttribute->productAttributeValue()->attach($value);
            }
        }
    }

}
