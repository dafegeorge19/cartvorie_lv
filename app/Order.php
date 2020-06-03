<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'customer_state_id', 'customer_area_id', 'delivery_street_address', 'paystack_payment_ref', 'paystack_payment_ref', 'delivery_fee', 'total_products_weight', 'payment_type'
    ];

    /**
     * Get the state that owns the order.
     */
    public function state()
    {
        return $this->belongsTo('App\State', 'delivery_state_id');
    }

    /**
     * Get the area that owns the order.
     */
    public function area()
    {
        return $this->belongsTo('App\Area', 'delivery_area_id');
    }

    /**
     * Get the area that owns the order.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the Billing state that owns the order.
     */
    public function billing_state()
    {
        return $this->belongsTo('App\State', 'billing_state_id');
    }

    /**
     * Get the Billing area that owns the order.
     */
    public function billing_area()
    {
        return $this->belongsTo('App\Area', 'billing_area_id');
    }

    public function get_billing_address()
    {
        return $this->billing_street_address . ', ' . $this->billing_area->name . ', ' . $this->billing_state->name;
    }

    /**
     * Get the Billing state that owns the order.
     */
    public function delivery_state()
    {
        return $this->belongsTo('App\State', 'delivery_state_id');
    }

    /**
     * Get the delivery area that owns the order.
     */
    public function delivery_area()
    {
        return $this->belongsTo('App\Area', 'delivery_area_id');
    }

    public function get_delivery_address()
    {
        return $this->delivery_street_address . ', ' . $this->delivery_area->name . ', ' . $this->delivery_state->name;
    }

    /**
     * Get the items for the order.
     */
    public function order_items()
    {
        return $this->hasMany('App\OrderItem');
    }

    public function order_total()
    {
        return $this->total_products_amount + $this->delivery_fee;
    }

    public function payment_method()
    {
        $payment_method = $this->payment_type;
        if($payment_method == 'cod') {
            return 'Pay on delivery';
        } elseif ($payment_method == 'pay_now') {
            return 'Paid with paystack';
        }
    }

    public function subtotal()
    {
        $order_items = $this->order_items;
        $subtotal = 0;

        if(count($order_items) > 0){
            foreach($order_items as $order_item) {
                $subtotal += $order_item->unit_price * $order_item->quantity;
            }
        }

        return $subtotal;
    }

    public function grand_total()
    {
        // return 12;
        return $this->subtotal() + $this->delivery_fee;
    }
}
