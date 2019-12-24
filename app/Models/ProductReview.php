<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    protected $fillable = ['product_id', 'rating_amount', 'reviewer_name', 'reviewer_email', 'subject', 'message'];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
