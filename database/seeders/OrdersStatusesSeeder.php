<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrdersStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        OrderStatus::create([
            'title' => 'refute',
            //'description' => ''
        ]);

        OrderStatus::create([
            'title' => 'unpaid',
            //'description' => ''
        ]);

        OrderStatus::create([
            'title' => 'awaiting',
            //'description' => ''

        ]);

        OrderStatus::create([
            'title' => 'preparing',
            //'description' => ''
        ]);

        OrderStatus::create([
            'title' => 'delivering',
            //'description' => ''
        ]);

        OrderStatus::create([
            'title' => 'delivered',
            //'description' => ''
        ]);
    }
}
