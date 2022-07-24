<?php

namespace App\Http\Controllers\Users\api;

use App\Models\Cart;
use App\Http\Controllers\Controller;

class PayController extends Controller
{

    public function payCart($cart_id)
    {

        $cart = Cart::findOrFail($cart_id);
        $cart->status = 3;
        $cart->save();

        return response([
            'msg' => 'Cart paid successfully.',
            'cart_id' => $cart_id
        ]);
    }
}
