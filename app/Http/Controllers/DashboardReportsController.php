<?php

namespace App\Http\Controllers;

use App\Http\Requests\DashboardRequest;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardReportsController extends Controller
{

    public function admin(DashboardRequest $request)
    {

        $form_fillter_data = $request->validated();
        $from_date = Carbon::now()->subDays($form_fillter_data['period'] ?? 30)->toDateTimeString();

        $past_period_order_count = Cart::where('status', 6)->where('created_at', '>=', Carbon::now()->subDays(($form_fillter_data['period'] ?? 30) * 2)->toDateTimeString())->count();

        $data = [
            'users' => [
                'count' => $users_count[] = User::count(),
                'new_count' => $users_count[] = User::where('created_at', '>=', $from_date)->count(),
                'growth' => round(($users_count[1] * 100) / $users_count[0])
            ],
            'orders' => [
                'count' => Cart::where('status', 6)->count(),
                'new_count' => $new_orders = Cart::where('status', 6)->where('created_at', '>=', $from_date)->count(),
                'growth' => $past_period_order_count === 0 ? 0 : ($past_period_order_count - $new_orders) / $past_period_order_count * 100
            ]
        ];

        return redirect()->route('dashboard.index')->with('reports', $data);
    }
}
