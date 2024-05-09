<?php 

namespace App\Services;

use App\Models\VideoCategory;
use App\Services\StatusService;
use App\Services\SlugService;

class VideoCategoryService
{
    // get all categories
    public static function all()
    {
        $categories = VideoCategory::with(['subcategories.videos'])->get();

        return $categories;
    }

    // store a new category
    public static function store(array $validated)
    {   
        $status = StatusService::active();
        $slugData = $validated['name'];
        $slug = SlugService::make($slugData);

        $categoryData = [
            'name' => $validated['name'],
            'slug' => $slug,
            // 'parent' => $validated['parent'],
            'status_id' => $status->id,
        ];

        $category = VideoCategory::create($categoryData);

        return $category;
    }

    // get all active categories
    public static function active()
    {
        $status = StatusService::active();

        $categories = VideoCategory::where('status_id', $status->id)->get();

        return $categories;
    }

    // get draft categries
    public static function drafts()
    {
        $status = StatusService::draft();

        $categories = VideoCategory::where('status_id', $staus->id)->get();

        return $categories;
    }

    // get cancelled categories
    public static function cancelled()
    {
        $status = StatusService::cancelled();

        $categories = VideoCategory::where('status_id', $status->id)->get();

        return $categories;
    }

    // get featured category
    public static function featured()
    {
        $category = VideoCategory::where('slug', 'featured')->first();

        return $category;
    }

    // get topVideos category
    public static function topVideos()
    {
        $category = VideoCategory::where('slug', 'top-videos')->first();

        return $category;
    }

    // get status count
    public static function count()
    {
        $categories = VideoCategory::count();

        return $categories;
    }

    // search for a category by id
    public static function search($id)
    {
        $category = VideoCategory::find($id);

        return $category;
    }
}