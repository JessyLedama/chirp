<?php 

namespace App\Services;

use App\Models\Subcategory;
use App\Services\SlugService;
use App\Services\StatusService;

class SubcategoryService
{
    // get subcategories
    public static function subcategories()
    {
        $subcategories = Subcategory::with(['category'])->get();

        return $subcategories;
    }

    // store subcategory
    public static function store($validated)
    {
        $slugData = $validated['name'];

        $slug = SlugService::make($slugData);

        $status = StatusService::active();

        $subcategoryData = [
            'name' => $validated['name'],
            'slug' => $slug,
            'category_id' => $validated['category_id'],
            'status_id' => $status->id,
        ];

        $subcategory = Subcategory::create($subcategoryData);

        return $subcategory;
    }
}