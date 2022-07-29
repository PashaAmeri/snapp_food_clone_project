<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\DashboardRequest;

class DashboardController extends Controller
{

    public function admin(DashboardRequest $request)
    {

        $reports = $this->fillterAdmin($request->validated('period') ?? 30);

        return view('dashboard', $reports);
    }

    public function seller()
    {

        $reports = $this->fillterSeller(30);

        return view('dashboard', $reports);
    }

    public function fillterSeller($period)
    {

        $from_date = Carbon::now()->subDays($period)->toDateTimeString();

        return [
            'orders' => [
                'count' => Cart::where('restaurant_id', auth()->user()->userRestaurant->id)->where('status', '>', '2')->count(),
                'new_count' => Cart::where('created_at', '>=', $from_date)->where('status', '>', '2')->count()
            ]
        ];
    }

    public function fillterAdmin($period)
    {

        $from_date = Carbon::now()->subDays($period)->toDateTimeString();

        $past_period_order_count = Cart::where('status', 6)->where('created_at', '>=', Carbon::now()->subDays(($form_fillter_data['period'] ?? 30) * 2)->toDateTimeString())->count();

        // $income = Cart::where('status', 6)->with('itemsPrice')->get();

        // dd($income);

        return [
            'period' => $period,
            'users' => [
                'count' => $users_count[] = User::count(),
                'new_count' => $users_count[] = User::where('created_at', '>=', $from_date)->count(),
                'growth' => round(($users_count[1] * 100) / $users_count[0])
            ],
            'orders' => [
                'count' => Cart::where('status', 6)->count(),
                'new_count' => $new_orders = Cart::where('status', 6)->where('created_at', '>=', $from_date)->count(),
                'growth' => $past_period_order_count === 0 ? 0 : ($past_period_order_count - $new_orders) / $past_period_order_count * 100
            ],
            'income' => [
                'total',
                'new',
                'growth'
            ]
        ];
    }
}
