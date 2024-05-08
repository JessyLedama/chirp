<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'comment',
        'chirp_id',
        'user_id',
    ];

    // comment belongsTo chirp
    public function chirp()
    {
        return $this->belongsTo(Chirp::class);
    }

    // comment belongsTo user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
