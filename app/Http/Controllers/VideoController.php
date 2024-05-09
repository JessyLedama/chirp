<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Services\VideoService;
use App\Services\SlideshowService;
use App\Services\VideoCategoryService;
use App\Services\SubcategoryService;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = VideoService::videos();

        return view('admin.video.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = SubcategoryService::subcategories();

        return view('admin.video.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'thumbnail' => ['image', 'mimes:jpg,jpeg,png,gif', 'max:30000'],
            'link' => ['required', 'url'],
            'preview' => ['required', 'url'],
            'subcategory_id' => ['required', 'string'],
        ]);

        VideoService::store($validated);

        session()->flash('success', 'Video stored successfully.');

        return redirect()->route('admin.videos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $video = VideoService::searchBySlug($slug);

        $more = VideoService::random();

        return view('admin.video.show', compact('video', 'more'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $video = VideoService::searchBySlug($slug);
        $categories = VideoCategoryService::all();

        return view('admin.video.edit', compact('video', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['string', 'max:255'],
            'thumbnail' => ['image', 'mimes:jpg,jpeg,png,gif'],
            'link' => ['url'],
            'preview' => ['url'],
            'category_id' => ['string'],
        ]);

        $validated['id'] = $id;
        
        VideoService::update($validated);

        session()->flash('success,', 'Video has been updated successfully.');

        return redirect()->route('admin.video.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        VideoService::delete($id);

        session()->flash('success', 'Video deleted.');

        return $this->index();
    }

    // get videos(for non admin)
    public function videos()
    {
        $slides = SlideshowService::all();
        $categories = VideoCategoryService::all();
        $topVideos = VideoService::videos();
        $featured = VideoService::featured();
        $latestVideos = VideoService::latestVideos();

        return view('videos', compact('categories', 'slides', 'topVideos', 'featured', 'latestVideos'));
    }

    // get select video(non admin)
    public function video($slug)
    {
        $video = VideoService::searchBySlug($slug);
        
        return view('video', compact('video'));
    }
}
