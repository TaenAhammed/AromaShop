<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingAddresses extends Model
{
    protected $fillable = ['country', 'city', 'zipcode', 'street', 'address'];

    public function purchaseOrder()
    {
        return $this->belongsTo('App\Models\PurchaseOrder');
    }
}
