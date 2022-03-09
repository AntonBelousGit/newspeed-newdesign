<?php


namespace App\Service;


use App\Models\Brand;
use App\Repositories\BrandRepositories;

class BrandService
{
    protected $brandRepositories;

    public function __construct(BrandRepositories $brandRepositories)
    {
        $this->brandRepositories = $brandRepositories;

    }

    public function getAllBrand()
    {
        return $this->brandRepositories->getAllBrand();
    }

    public function getBrandById($id)
    {
        return $this->brandRepositories->getBrandById($id);
    }

    public function storeBrand($validated_data)
    {
        $brand = (new Brand())->create($validated_data->toArray());
        $brand->save();
        return $brand;
    }

    public function updateBrand($validated_data, $brand)
    {
        $brand->fill($validated_data->toArray());
        $brand->update();
        return $brand;
    }

    public function deleteBrand($brand)
    {
        $brand->delete();
    }
}
