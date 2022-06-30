<?php

namespace Database\Seeders;

use App\Models\RestaurantCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        RestaurantCategory::create([
            'category_name' => 'Fast Food',
            'category_description' => 'Fast food is a type of mass-produced food designed for commercial resale, with a strong priority placed on speed of service. It is a commercial term, limited to food sold in a restaurant or store with frozen, preheated or precooked ingredients and served in packaging for take-out/take-away.'
        ]);

        RestaurantCategory::create([
            'category_name' => 'Lebanese',
            'category_description' => "The heart of flavour in Lebanese food is spice. The spices used in traditional Lebanese cuisine make it truly irresistible – from the well-rounded flavours of za'atar and baharat to the tang of sumac, through to the freshness of mint and the sweetness of cardamom."

        ]);

        RestaurantCategory::create([
            'category_name' => 'Iranian',
            'category_description' => 'What is the traditional food of Iran? Major staples of Iranian food that are usually eaten with every meal include rice, various herbs, cheese, a variety of flat breads, and some type of meat (usually poultry, beef, lamb, or fish). Stew over rice is by far the most popular dish, and the constitution of these vary by region.'
        ]);

        RestaurantCategory::create([
            'category_name' => 'Cafe',
            'category_description' => "The word comes from the French 'café' meaning coffee house. It is usually a relatively small place that sells non-alcoholic beverages along with a few items of food such as sandwiches and pastries. A cafe can be located inside a building or it can be an open-air establishment."
        ]);
    }
}
