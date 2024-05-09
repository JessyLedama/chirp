<?php 

namespace App\Services;

use App\Models\Chirp;

class ChirpService{
    
    // get all chirps
    public static function chirps()
    {
        $chirps = Chirp::with(['likes'])->get();

        return $chirps;
    }

    // count the chirps
    public static function count()
    {
        $count = Chirp::count();

        return $count;
    }
}