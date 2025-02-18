<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'thumbnail', 'price', 'about', 'product_file', 'category_id', 'creator_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

public function orders()
    {
        return $this->hasMany(product_order::class);
    }

}
