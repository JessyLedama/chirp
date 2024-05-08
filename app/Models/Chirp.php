<?php

namespace App\Models;

use App\Events\ChirpCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chirp extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'user_id',
    ];

    // dispatch an event
    protected $dispatchesEvents = [
        'created' => ChirpCreated::class,
    ];

    // chirp belongsTo user()
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // chirp hasMany likes
    public function likes()
    {
        return $this->hasMany(LikeChirps::class);
    }

    // chirp hasMany comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
