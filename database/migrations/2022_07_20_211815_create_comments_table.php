<?php

use App\Models\Cart;
use App\Models\Restaurant;
use App\Models\User;
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

        Schema::create('comments', function (Blueprint $table) {

            $table->id();

            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Cart::class);
            $table->foreignIdFor(Restaurant::class);
            $table->unsignedBigInteger('reply_to')->nullable();

            $table->text('content');
            $table->decimal('score', '5');

            $table->timestamps();
        });

        // foreign to id on the same table
        Schema::table('comments', function (Blueprint $table) {

            $table->foreign('reply_to')->references('id')->on('comments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('comments');
    }
};
