<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $fillable = ['user_id', 'status', 'billing_address_id', 'shipping_address_id', 'unique_code'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function purchaseOrderItems()
    {
        return $this->hasMany('App\Models\PurchaseOrderItem');
    }

    public function billingAddress()
    {
        return $this->belongsTo('App\Models\BillingAddresses');
    }

    public function shippingAddress()
    {
        return $this->belongsTo('App\Models\ShippingAddresses');
    }
}
