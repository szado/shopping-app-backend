<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'shopping_cart';
    public $timestamps = true;

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function offer()
    {
        return $this->hasOne(Offer::class);
    }
}
