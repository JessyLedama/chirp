<?php 

namespace App\Services;

use App\Models\Chirp;

class LikeChirpService{
    
    // get all chirps
    public static function chirps()
    {
        $chirps = Chirp::with(['likes'])->get();

        return $chirps;
    }
}