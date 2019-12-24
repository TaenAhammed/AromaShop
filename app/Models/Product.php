<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'category_id', 'discount_id', 'product_vendor_id'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function productImage()
    {
        return $this->belongsTo('App\Models\ProductImage');
    }

    public function discount()
    {
        return $this->belongsTo('App\Models\Discount');
    }

    public function productReviews()
    {
        return $this->hasMany('App\Models\ProductReview');
    }

    public function productVendors()
    {
        return $this->belongsTo('App\Models\ProductVendor');
    }

    public function specifications()
    {
        return $this->hasMany('App\Models\Specification');
    }

    public function productComments()
    {
        return $this->hasMany('App\Models\ProductComment');
    }

    public function inventory()
    {
        return $this->belongsTo('App\Models\Inventory');
    }

    public function purchaseOrderItems()
    {
        return $this->hasMany('App\Models\PurchaseOrderItem');
    }

    public function favoriteProducts()
    {
        return $this->hasMany('App\Models\FavoriteProduct');
    }
}
