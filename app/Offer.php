<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'offers';
    protected $timestamps = true;

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function category()
    {
        return $this->hasOne(Category::class);
    }
}
