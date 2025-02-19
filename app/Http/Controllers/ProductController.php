<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        // Jika user adalah admin, ambil semua produk
        if ($user->role === 'admin') {
            $products = Product::all();
        } else {
            // Jika bukan admin, hanya ambil produk yang dibuat oleh user
            $products = Product::where('creator_id', $user->id)->get();
        }

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $user = Auth::user();
        DB::transaction(function () use ($request, $user) {
            $validated = $request->validated();

            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnail', 'public');
                $validated['thumbnail'] = $thumbnailPath; // Example: /storage/icons/angga.png
            }
            if ($request->hasFile('product_file')) {
                $product_filePath = $request->file('product_file')->store('product_file', 'public');
                $validated['product_file'] = $product_filePath; // Example: /storage/icons/angga.png
            }
            $validated['slug'] = Str::slug($validated['name']);
            $validated['creator_id'] = $user->id;
            $newProduct = Product::create($validated);
        });
        return redirect()->route('product.index')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        $categories = category::all();
        $product = Product::find($product->id);
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //

        $validated = $request->validated();

        DB::transaction(function () use ($validated, $product) {
            if (isset($validated['thumbnail'])) {
                Storage::disk('public')->delete($product->thumbnail);
                $validated['thumbnail'] = $validated['thumbnail']->store('thumbnail', 'public');
            }
    
            if (isset($validated['product_file'])) {
                Storage::disk('public')->delete($product->product_file);
                $validated['product_file'] = $validated['product_file']->store('product_file', 'public');
            }
    
            $validated['slug'] = Str::slug($validated['name']);
            $product->update($validated);
        });
    
        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */ 
    public function destroy(Product $product)
    {
        //
        DB::beginTransaction();
        try {
            $product->delete();
            DB::commit();
            return redirect()->route('product.index')->with('success', 'Product deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
}
