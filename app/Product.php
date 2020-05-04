<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function category()
    {
        return $this->hasOne(Category::class);
    }
}
