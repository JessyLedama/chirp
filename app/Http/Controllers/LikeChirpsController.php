<?php

namespace App\Http\Controllers;

use App\Models\LikeChirps;
use Illuminate\Http\Request;
use Auth;
use App\Services\LikeChirpService;

class LikeChirpsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'chirp_id' => ['string'],
        ]);

        $validated['user_id'] = Auth::id();

        $like = LikeChirpService::store($validated);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LikeChirps $likeChirps)
    {
        //
    }
}
