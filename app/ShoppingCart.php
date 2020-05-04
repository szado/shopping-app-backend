<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
