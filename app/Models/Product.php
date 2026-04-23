<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'name',
        'price',
        'description',
        'short_description',
        'material',
        'color',
        'style',
        'size',
        'power',
        'category_id',
        'collection_id',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'brand_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'product_id', 'product_id');
    }

    // public function reviews()
    // {
    //     return $this->hasMany(Review::class, 'product_id', 'product_id');
    // }
    public function isFavorite()
    {
        return Favorite::where('user_id', auth()->id())
            ->where('product_id', $this->product_id)
            ->exists();
    }
    
    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id', 'product_id');
    }
    public function userHasPurchased()
    {
        if (!auth()->check()) {
            return false;
        }

        return \DB::table('orders')
            ->join('order_items', 'orders.order_id', '=', 'order_items.order_id')
            ->where('orders.user_id', auth()->id())
            ->where('order_items.product_id', $this->product_id)
            ->exists();
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }
    public function collection()
    {
        return $this->belongsTo(Collection::class, 'collection_id', 'collection_id');
    }


}
