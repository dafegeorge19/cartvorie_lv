<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use SoftDeletes;

    
    /**
     * Get the category that owns the product.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Get the supermarket that owns the product.
     */
    public function supermarket()
    {
        return $this->belongsTo('App\Supermarket');
    }

    /**
     * Get the address where the suppermarket is located.
     */
    public function get_address() : iterable
    {
        $state = $this->supermarket->state->name;
        $area = $this->supermarket->area->name;
        $street_address = $this->supermarket->street_address;

        return [
            'street_address' => $street_address,
            'area' => $area,
            'state' => $state
        ];
    }

    /**
     * Get the user that owns the product.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the type that owns the product.
     */
    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    /**
     * Get all of the product's images.
     */
    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    public function product_price()
    {
        $sales_price = $this->sales_price;
        $price = $this->price;

        if($sales_price <= 0) {
            return $price;
        } else {
            return $sales_price;
        }
    }

    public function price_html()
    {
        $sales_price = $this->sales_price;
        $price = $this->price;

        if($sales_price <= 0) {
            return <<<EOD
            <span class="price">
                <ins>
                    <span class="amount d-block">₦ $price</span>
                </ins>
            </span>
EOD;
        } else {
            return <<<EOD
            <span class="price">
                <ins>
                    <span class="amount" style="padding-bottom: 0px">₦ $sales_price</span>
                </ins>
                <del>
                    <span class="amount d-block pt-0" style="font-size: 15px">₦ $price</span>
                </del>
            </span>
EOD;
        }

        
    }

    public function getPriceAttribute($value)
    {
        $price = (float) $value;
        return number_format($price, 2);
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = str_replace(',', '', $value);
    }

    public function getSalesPriceAttribute($value)
    {
        $sales_price = (float) $value;
        return number_format($sales_price, 2);
    }

    public function setSalesPriceAttribute($value)
    {
        $this->attributes['sales_price'] = str_replace(',', '', $value);
    }

    public function get_product_image($image_position)
    {
        $images = $this->images;

        $breaker = '';
        if($image_position == 1) {
            $breaker = 'image1';
        } elseif ($image_position == 2) {
            $breaker = 'image2';
        } elseif ($image_position == 3) {
            $breaker = 'image3';
        } elseif ($image_position == 4) {
            $breaker = 'image4';
        } elseif ($image_position == 5) {
            $breaker = 'image5';
        } elseif ($image_position == 6) {
            $breaker = 'image6';
        } else {
            return 'avatar.png';
        }
        
        foreach($images as $image) {

            $image_name = $image->name;
            $substring = substr($image_name, 0, 6);

            if($substring == $breaker) {
                return $image_name;
                break;
            }
            
        }

        return 'avatar.png';

    }

}
