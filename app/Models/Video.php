<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'thumbnail', 'link', 'category_id', 'preview'];

    // a $video belongsTo() a $category
    public function category()
    {
        return $this->belongsTo(VideoCategory::class, 'category_id');
    }

    // a video may hasMany() comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
