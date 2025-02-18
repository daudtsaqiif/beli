<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_order extends Model
{
    //
    use HasFactory;

    protected $fillable = ['creator_id', 'buyer_id', 'product_id', 'total_price', 'is_paid', 'proof',];

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
