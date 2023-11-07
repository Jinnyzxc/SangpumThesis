<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Products.php (Eloquent model)
class Products extends Model
{
    // Define a one-to-many relationship with SalesInfo
    public function salesInfo()
    {
        return $this->hasMany(SalesInfo::class, 'product_id', 'id');
    }

    // Define a one-to-one relationship with ShippingInfo
    public function shippingInfo()
    {
        return $this->hasOne(ShippingInfo::class, 'product_id', 'id');
    }
}

