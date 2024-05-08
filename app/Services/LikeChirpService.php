<?php

namespace App\Services;

use App\Models\LikeChirps;
use Auth;

class LikeChirpService
{
    // store a new like
    public static function store($validated)
    {
        $like = LikeChirps::create($validated);

        return $like;
    }

    // check if chirp is already liked
    public static function liked($chirpData)
    {   
        $liked = LikeChirps::where('chirp_id', $chirpData['chirp_id'])->where('user_id', Auth::id())->first();

        if(!$liked == null)
        {
            return true;
        }
        else{
            return false;
        }
    }
}