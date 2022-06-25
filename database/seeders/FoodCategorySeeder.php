<?php

namespace Database\Seeders;

use App\Models\FoodCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {

        FoodCategory::create([
            'category_name' => 'Pizza',
            'category_description' => 'Pizza is a dish of Italian origin consisting of a usually round.'
        ]);

        FoodCategory::create([
            'category_name' => 'Burger',
            'category_description' => 'A hamburger is a food consisting of fillings —usually a patty of ground meat, typically beef—placed inside a sliced bun or bread roll.'

        ]);

        FoodCategory::create([
            'category_name' => 'Pasta',
            'category_description' => 'Pasta is a type of food typically made from an unleavened dough of wheat flour mixed with water or eggs, and formed into sheets or other shapes, then cooked by boiling or baking.'
        ]);

        FoodCategory::create([
            'category_name' => 'Soups and Stews',
            'category_description' => "Another way to look at it: Soup is any combination of ingredients cooked in liquid. Stew is any dish that's prepared by stewing—that is, submerging the ingredients with just enough liquid to cook them through at a simmer in a covered pot for a long time."
        ]);
    }
}
