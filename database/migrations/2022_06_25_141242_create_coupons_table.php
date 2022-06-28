<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('coupons', function (Blueprint $table) {

            $table->id();
            // The voucher code
            $table->string('coupon_code')->nullable();
            // The human readable voucher code name
            $table->string('coupon_title');
            // The description of the voucher
            $table->text('coupon_description')->nullable();
            // The number of uses currently
            $table->integer('uses_number')->unsigned()->nullable();
            // The max uses this voucher has
            $table->integer('max_uses')->unsigned()->nullable();
            // How many times a user can use this voucher.
            $table->integer('max_uses_per_user')->unsigned()->nullable();
            // The amount to discount.
            $table->integer('discount_amount');
            // Whether or not the voucher is a percentage or a fixed price. 
            $table->boolean('is_percentage')->default(false);
            // When the voucher begins
            $table->timestamp('starts_at');
            // When the voucher ends
            $table->timestamp('expires_at');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
};
