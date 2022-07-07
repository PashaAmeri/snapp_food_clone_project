<?php

use App\Models\RestaurantCategory;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(User::class);
            $table->foreignIdFor(RestaurantCategory::class);

            $table->string('restaurant_image')->nullable();

            $table->string('restaurant_name');
            $table->string('restaurant_phone');
            $table->text('restaurant_description');
            $table->string('bank_number');
            $table->float('score')->default(0);

            $table->json('restaurant_address');
            $table->json('schedule');

            $table->boolean('is_open')->default(0);

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
        Schema::dropIfExists('restaurants');
    }
};
