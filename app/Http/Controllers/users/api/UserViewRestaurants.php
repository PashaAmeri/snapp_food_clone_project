<?php

namespace App\Http\Controllers\users\api;

use App\Models\Food;
use App\Models\Restaurant;
use App\Models\FoodCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserViewRestaurants extends Controller
{

    public function getRestaurantByID($restaurant_id)
    {

        $restaurant_info = Restaurant::findOrdFail($restaurant_id);
        $restaurant_info->restaurant_address = json_decode($restaurant_info->restaurant_address);
        $restaurant_info->schedule = json_decode($restaurant_info->schedule);

        return response($restaurant_info) ?? response(['message' => 'Notfound', 404]);
    }

    public function restaurantSearch(Request $request)
    {

        $query = Restaurant::query();

        if (!is_null($request->is_open)) {

            $query->where('is_open', $request->is_open);
        }

        if (!is_null($request->type)) {

            $query->where('restaurant_category_id', $request->type);
        }

        if (!is_null($request->score)) {

            // TODO: fix scoce issue(change model)
            $query->where('score', '>=', $request->score);
        }

        $restauranrs = $query->get();

        return response($restauranrs, 200);
    }

    public function restaurantFoods($restaurant_id)
    {

        $user = Restaurant::findOrFail($restaurant_id)->user_id;

        $foods = [];
        $categories = FoodCategory::all('id', 'category_name');

        foreach ($categories as $category) {

            $foods[$category->category_name] = Food::where('user_id', $user)->where('food_category_id', $category->id)->get();
        }

        return response($foods);
    }
}
