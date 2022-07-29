<?php

namespace App\Http\Controllers\Users\api;

use App\Models\Cart;
use App\Models\Food;
use App\Models\CartItem;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCartRequest;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->authorize('view', Cart::class);

        $carts = Cart::where('user_id', auth()->user()->id)->get();

        foreach ($carts as $cart) {

            $restaurant = Restaurant::find($cart->restaurant_id);
            $cart_items = CartItem::where('cart_id', $cart->id)->get();

            $cart_food = [];

            foreach ($cart_items as $item) {

                $food = Food::find($item['food_id']);

                $cart_food[] = [
                    'id' => $food->id,
                    'name' => $food->food_name,
                    'count' => $item->count,
                    'price' => $food->price
                ];
            }

            $user_carts_data['carts'][] = [
                'id' => $cart->id,
                'restaurant' => [
                    'title' => $restaurant->restaurant_name,
                    'image' => $restaurant->restaurant_image
                ],
                'foods' => $cart_food,
                'created_at' => $cart->created_at,
                'updated_at' => $cart->created_at,
            ];
        }

        return response($user_carts_data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCartRequest $request)
    {

        $this->authorize('create', Cart::class);

        $cart_form_data = $request->validated();

        $food = Food::find($cart_form_data['food_id']);
        $restaurant = Restaurant::where('user_id', $food->user_id)->first();

        $cart_id = Cart::create([
            'user_id' => auth()->user()->id,
            'restaurant_id' => $restaurant->id
        ])['id'];

        CartItem::create([
            'cart_id' => $cart_id,
            'food_id' => $food->id,
            'price' => $food->food_price,
            'count' => $cart_form_data['count']
        ]);

        return response([
            'msg' => 'food added to cart successfully',
            'cart_id' => $cart_id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $this->authorize('viwe', Cart::class);

        $cart = Cart::findOrFail($id)->where('is_paid', false);

        $restaurant = Restaurant::find($cart->restaurant_id);
        $cart_items = CartItem::where('cart_id', $id)->get();

        $cart_food = [];

        foreach ($cart_items as $item) {

            $food = Food::find($item['food_id']);

            $cart_food[] = [
                'id' => $food->id,
                'name' => $food->food_name,
                'count' => $item->count,
                'price' => $food->price
            ];
        }

        $user_cart_data = [
            'id' => $cart->id,
            'restaurant' => [
                'title' => $restaurant->restaurant_name,
                'image' => $restaurant->restaurant_image
            ],
            'foods' => $cart_food,
            'created_at' => $cart->created_at,
            'updated_at' => $cart->created_at,
        ];


        return response($user_cart_data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCartRequest $request, $id)
    {

        $this->authorize('update', Cart::class);

        $cart_form_data = $request->validated();

        CartItem::create([
            'cart_id' => $id,
            'food_id' => $cart_form_data['food_id'],
            'count' => $cart_form_data['count']
        ]);

        return response([
            'msg' => 'food added to cart successfully',
            'cart_id' => $id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
