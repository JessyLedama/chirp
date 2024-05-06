<?php

namespace App\Services;

class SlugService
{
    // make slug
    public static function make($slugData)
    {
        $slug = str_replace(' ', '-', strtolower($slugData));

        return $slug;
    }
}