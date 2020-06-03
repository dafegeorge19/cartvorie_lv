<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id', 'product_id', 'product_name', 'product_weight', 'unit_price', 'quantity'
    ];

    /**
     * Get the order that owns the item.
     */
    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    /**
     * Get the product that owns the item.
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function item_total()
    {
        return $this->quantity * $this->unit_price;
    }
}
