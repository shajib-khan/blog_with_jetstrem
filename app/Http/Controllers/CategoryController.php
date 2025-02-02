<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //public $parent_id=1;
    public function index()
    {
        return view('components.dashboard.category.index',[
            'categories'=>Category::with('subcategories')->whereNull('parent_id')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('components.dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name'      => ['required', 'max:200'],
            'parent_id' => ['sometimes', 'nullable', 'numeric'],
        ]);

        $category = new Category();
        $category->name = $validated['name'];
        $category->parent_id = $validated['parent_id'] ?? null;
        $category->slug = Str::slug($validated['name']); // Generate slug
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('components.dashboard.category.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
