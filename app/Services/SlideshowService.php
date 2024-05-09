<?php 

namespace App\Services;

use App\Models\Slideshow;
use Illuminate\Support\Arr;

class SlideshowService
{
    // get all slides
    public static function all()
    {
        $slideshow = Slideshow::all();

        return $slideshow;
    }

    // search for a slide by id
    public static function find($id)
    {
        $slide = Slideshow::find($id);

        return $slide;
    }

    // get nth slide
    public static function nthSlide($n)
    {
        $slideshow = Slideshow::find($n);

        return $slideshow;
    }

    // store a new slide
    public static function store($validated)
    {
        if(isset($validated['image']))
        {
            // get cover image
            $image = $validated['image']->store('slides', ['disk' => 'public']);
        }
        
        $slideData = [
            'name' => $validated['name'],
            'image' => $image ?? '',
            'description' => $validated['description'],
        ];
        
        $slideshow = Slideshow::create($slideData);

        return $slideshow;
    }

    // update a slide
    public static function update($validated)
    {
        // get cover image
        if(isset($validated['image']))
        {
            $image = $validated['image']->store('slides', ['disk' => 'public']);
        }

        unset($validated['image']);

        $slideData = [];
        
        foreach($validated as $key => $value)
        {
            if($value !== null)
            {
                $slideData[$key] = $value;
            }
        }

        $slideData['image'] = $image;
        
        $slideshow = Slideshow::find($slideData['id']);

        unset($slideData['id']);

        $slideshow->update($slideData);

        return $slideshow;
    }

    // get the count of slides
    public static function count()
    {
        $slideshows = Slideshow::count();

        return $slideshows;
    }
}
    