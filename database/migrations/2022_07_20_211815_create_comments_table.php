<?php

use App\Models\Cart;
use App\Models\User;
use App\Models\Restaurant;
use App\Models\CommentStatus;
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

        Schema::create('comments', function (Blueprint $table) {

            $table->id();

            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Cart::class);
            $table->foreignIdFor(Restaurant::class);
            $table->foreignIdFor(CommentStatus::class, 'status')->default(2);

            $table->text('content');
            $table->tinyInteger('score');

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

        Schema::dropIfExists('comments');
    }
};
