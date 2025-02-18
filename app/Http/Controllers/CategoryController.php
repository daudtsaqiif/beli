<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryReques;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        //
        DB::transaction(function () use($request) {
            $validated = $request->validated();
            if ($request->hasFile('icon')) {
                $iconPath = $request->file('icon')->store('icons', 'public');
                $validated['icon'] = $iconPath;
            }
            $validated['slug'] = Str::slug($validated['name']);
            $newCategory = category::create($validated);
        });
        return redirect()->route('category.index')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        //
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryReques $request, category $category)
    {
        //
        DB::transaction(function () use ($request, $category) {
            $validated = $request->validated();
            if ($request->hasFile('icon')) {
                $iconPath = $request->file('icon')->store('icons', 'public');
                $validated['icon'] = $iconPath;
            }
            $validated['slug'] = Str::slug($validated['name']);
            $category->update($validated);
        });
        return redirect()->route('category.index')->with('success', 'Category Edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        //
        DB::beginTransaction();
        try {
            $category->delete();
            DB::commit();
            return redirect()->route('category.index')->with('success', 'Category deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
}
