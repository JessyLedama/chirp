<?php

namespace App\Services;

use App\Models\User;
use App\Services\StatusService;

class UserService
{
    // get all users
    public static function users()
    {
        $users = User::all();

        return $users;
    }

    // get active users
    public static function active()
    {
        $status = StatusService::active();
        $active = User::where('status_id', $status->id)->get();

        return $active;
    }

    // get inactive users
    public static function inactive()
    {
        $status = StatusService::inactive();
        $inactive = User::where('status_id', $status->id)->get();

        return $inactive;
    }

    // find a user by id
    public static function find($id)
    {   
        $user = User::find($id);

        return $user;
    }
}