<?php

namespace App\Http\Controllers;

use App\Services\SubcategoryService;
use Illuminate\Http\Request;
use App\Services\VideoCategoryService;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = SubcategoryService::subcategories();

        return view('admin.subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = VideoCategoryService::all();

        return view('admin.subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'unique:subcategories', 'string', 'max:50'],
            'category_id' => ['required', 'string'],
        ]);

        $subcategory = SubcategoryService::store($validated);

        session()->flash('success', 'Subcategory stored.');

        return redirect()->route('admin.subcategories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {
        //
    }
}
