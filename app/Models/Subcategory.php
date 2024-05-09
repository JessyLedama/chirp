<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'status_id',
    ];

    // subcategories belongTo category
    public function category()
    {
        return $this->belongsTo(VideoCategory::class, 'category_id');
    }

    // subcategory hasMany videos
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
