<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('billing_first_name');
            $table->string('billing_other_names');
            $table->string('billing_state_id');
            $table->string('billing_area_id');
            $table->string('billing_street_address');
            $table->string('billing_phone_number');
            $table->string('billing_email');

            $table->string('delivery_first_name');
            $table->string('delivery_other_names');
            $table->string('delivery_state_id');
            $table->string('delivery_area_id');
            $table->string('delivery_street_address');
            $table->string('delivery_phone_number');
            $table->string('delivery_email');
            $table->string('order_note')->nullable();

            $table->string('paystack_payment_ref')->nullable();

            $table->float('total_products_amount', 19, 2);
            $table->float('delivery_fee', 19, 2);
            $table->float('total_products_weight', 19, 2);
            $table->string('payment_type');

            $table->dateTime('delivered_at', 3)->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
