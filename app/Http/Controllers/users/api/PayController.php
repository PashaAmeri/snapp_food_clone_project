<?php

namespace App\Http\Controllers\Users\api;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PayController extends Controller
{

    public function payCart($cart_id)
    {

        Cart::where('id', $cart_id)->update([
            'status' => '2'
        ]);

        return response([
            'msg' => 'Cart paid successfully.',
            'cart_id' => $cart_id
        ]);
    }
}
