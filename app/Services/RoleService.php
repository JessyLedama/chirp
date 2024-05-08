<?php

namespace App\Services;

use App\Models\Role;
use App\Services\SlugService;

class RoleService
{
    // get all roles
    public static function roles()
    {
        $roles = Role::all();

        return $roles;
    }

    // store a new role
    public static function store($validated)
    {
        $slugData = $validated->name;

        $slug = SlugService::make($slugData);

        $roleData = [
            'name' => $validated->name,
            'slug' => $slug,
        ];

        $role = Role::create($roleData);

        return $role;
    }
}