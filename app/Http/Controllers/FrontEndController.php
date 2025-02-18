<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\category;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){
        $categories = category::all();
        $products = Product::all();
        return view('front.index', compact('categories', 'products'));
    }
    public function detail(Product $product){
        $categories = category::all();
        $randomProduct = Product::whereKeyNot($product->id)->inRandomOrder()->limit(5)->get();
        return view('front.details', compact('product', 'randomProduct','categories'));
    }
}
