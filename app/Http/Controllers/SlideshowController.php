<?php

namespace App\Http\Controllers;

use App\Models\Slideshow;
use Illuminate\Http\Request;

class SlideshowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slides = SlideshowService::all();

        return view('admin.slideshow.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slideshow.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'no' => ['required', 'string', 'max:2', 'unique:slideshows'],
            'image' => ['mimes:jpg,png,gif,jpeg'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

        SlideshowService::store($validated);

        session()->flash('success', 'Slide has been stored.');

        return redirect()->route('admin.slideshow.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $slide = SlideshowService::find($id);

        return view('admin.slideshow.show', compact('slide'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $slide = SlideshowService::find($id);

        return view('admin.slideshow.edit', compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $validated = $request->validate([
            'image' => ['image', 'mimes:jpg,jpeg,png,gif'],
            'name' => ['string', 'max:255'],
            'link' => ['url'],
            'description' => ['string'],
        ]);

        $validated['id'] = $id;

        SlideshowService::update($validated);
        
        session()->flash('success', 'Slide has been updated.');

        return redirect()->route('admin.slideshow.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slideshow $slideshow)
    {
        //
    }
}
