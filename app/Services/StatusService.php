<?php 

namespace App\Services;

use App\Models\Status;
use App\Services\SlugService;

class StatusService
{
    // get all statuses
    public static function statuses()
    {
        $statuses = Status::all();

        return $statuses;
    }

    // get active status
    public static function active()
    {
        $active = Status::where('slug', 'active')->first();

        return $active;
    }

    // get inactive status
    public static function inactive()
    {
        $inactive = Status::where('slug', 'inactive')->first();

        return $inactive;
    }

    // store a new status
    public static function store($validated)
    {
        $slug = SlugService::make($validated['name']);

        $statusData = [
            'name' => $validated['name'],
            'slug' => $slug,
        ];

        $status = Status::create($statusData);

        return $status;
    }
}