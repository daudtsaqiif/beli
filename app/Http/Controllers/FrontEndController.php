<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontEndController extends Controller
{
    public function index(){
        $categories = category::all();
        $products = Product::all();
        return view('front.index', compact('categories', 'products'));
    }
    public function detail(Product $product){
        $user = Auth::user();
        $categories = category::all();
        $randomProduct = Product::whereKeyNot($product->id)->inRandomOrder()->limit(5)->get();
        return view('front.details', compact('product', 'randomProduct','categories'));
    }

    public function checkout(Product $product){
        $user = Auth::user();
        return view('front.checkout',compact('user','product'));
    }

}
