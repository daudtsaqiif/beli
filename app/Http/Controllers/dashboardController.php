<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\category;
use Illuminate\Http\Request;
use App\Models\product_order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{

    public function order(){
        $user = Auth::user();
        $orders = product_order::where('creator_id', Auth::id())->get();
        // Return ke halaman order.index dengan data orders
        return view('admin.order.index', compact('orders','user'));
    }   

    public function storeOrder(Request $request)
    {
        DB::transaction(function () use ($request) {
            $product = Product::findOrFail($request->product_id);
    
            // Validasi data
            $request->validate([
                'proof'       => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:3000'],
            ]);
    
            // Cek apakah buyer_id sama dengan creator_id
            if (Auth::id() === $product->creator_id) {
                return back()->withErrors(['buyer_id' => 'You cannot purchase your own product.']);
            }
    
            // Simpan bukti pembayaran
            $proofPath = $request->file('proof')->store('proofs', 'public');
    
            // Simpan order ke database
            product_order::create([
                'creator_id'  => $product->creator_id,
                'buyer_id'    => Auth::id(),
                'product_id'  => $product->id,
                'total_price' => $product->price,
                'is_paid'     => false,
                'proof'       => $proofPath,
            ]);
        });
    
        return redirect()->route('dashboard.order')->with('success', 'Transaction successful');
    }
    

    public function success()
    {
        return view('front.success-checkout');
    }

}
