<?php

namespace App\Http\Controllers\Seller;

use App\Models\Cart;
use App\Models\Food;
use App\Models\User;
use App\Models\Order;
use App\Models\Address;
use App\Models\CartItem;
use App\Models\Restaurant;
use App\Models\OrderStatus;
use App\Jobs\OrderStatusJob;
use Illuminate\Http\Request;
use App\Mail\SendOrderStatusMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\OrderStatusCodeRequest;

class SellerOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $restaurant_id = Restaurant::where('user_id', auth()->user()->id)->first('id');
        $orders = Cart::where('restaurant_id', $restaurant_id->id)->where('status', '!=', 2)->get();

        $orders_info = [];
        $foods = [];
        $total_price = 0;

        foreach ($orders as $order) {

            $user = User::find($order->user_id);
            $address = Address::find($user->default_address_id);
            $order_items = CartItem::where('cart_id', $order->id)->get();
            $status = OrderStatus::find($order->status);

            foreach ($order_items as $item) {

                $food = Food::find($item->food_id);

                $total_price += $food->food_price * $item->count;

                $foods[] = [
                    'name' => $food->food_name,
                    'price' => $food->food_price
                ];
            }

            $orders_info[] = [
                'id' => $order->id,
                'customer' => [
                    'name' => $user->name,
                    'phone' => $user->phone,
                    'address' => $address->address,
                ],
                'items' => $foods,
                'status' => [
                    'code' => $status->id,
                    'title' => $status->title
                ],
                'total' => $total_price,
            ];
        }

        return view('seller_orders.orders_index', [
            'orders' => $orders_info
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderStatusCodeRequest $request, $id)
    {

        if (Cart::where('id', $id)->update(['status' => $request->validated()['status_code']])) {

            $mail_to_user = Cart::where('id', $id)
                ->with([
                    'cartCustomer' => function ($query) {

                        $query->select(['id', 'name', 'email']);
                    },
                    'cartStatus' => function ($query) {

                        $query->select(['id', 'title', 'description']);
                    }
                ])->first();

            dispatch(new OrderStatusJob($mail_to_user));

            return redirect()->route('orders.index');
        }

        // TODO: redirect errors
        return redirect()->route('orders.index');
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
