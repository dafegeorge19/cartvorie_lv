<?php

class PaymentHelpers {
    public function calc_delivery_fee($total_weight) {

        if($total_weight > 0) {
			$base_delivery_fee = 1000;
			$price_per_kg = 20;
			$total_kg_price = $price_per_kg * $total_weight;
			$total_delivery_fee = $total_kg_price + $base_delivery_fee;
			return $total_delivery_fee;
		} else {
			return null;
		}
    }

}