<?php

use App\Models\Food;
use App\Models\OrderStatus;
use App\Models\User;
use App\Models\Restaurant;
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

        Schema::create('carts', function (Blueprint $table) {

            $table->id();

            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Restaurant::class);
            $table->foreignIdFor(OrderStatus::class, 'status')->default(1);

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

        Schema::dropIfExists('carts');
    }
};
