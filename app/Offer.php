<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Object_;

class Offer extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'offers';
    public $timestamps = true;

    protected $guarded = [];

    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
