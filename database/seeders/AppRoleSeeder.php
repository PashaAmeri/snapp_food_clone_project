<?php

namespace Database\Seeders;

use App\Models\AppRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        AppRole::create(['role_name' => 'Manager']);
        AppRole::create(['role_name' => 'Admin']);
        AppRole::create(['role_name' => 'Seller']);
        AppRole::create(['role_name' => 'User']);
    }
}
