<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Discount;
use App\Models\Ingredient;
use App\Models\MenuItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    public function run(): void
    {
        // create categories
        $categories_list = ['starters', 'breakfast', 'lunch', 'drinks'];
        $categories = collect($categories_list)->mapWithKeys(function ($name) {
            $category = Category::factory()->create(['name' => $name]);
            return [$name => $category];
        });

        // Some random discounts
        $discounts = Discount::factory()->count(5)->create();

        // dummy data
        $items = [
            [
                'name' => 'Tomato Soup',
                'description' => 'A classic tomato soup.',
                'price' => 4.90,
                'image' => 'https://cdn.prod.website-files.com/6321d0d284b5b7ca3857fad3/6324bdfe0ebb94925875d95f_menu-tomato-toast.webp',
                'tag' => '',
                'category' => 'starters',
                'discount' => false,
            ],
            [
                'name' => 'Noodle Soup',
                'description' => 'A classic noodle soup.',
                'price' => 5.50,
                'image' => 'https://cdn.prod.website-files.com/6321d0d284b5b7ca3857fad3/6324bdfe3f4c8b7cc88b25f7_menu-noodle-soup.webp',
                'tag' => '',
                'category' => 'starters',
                'discount' => false,
            ],
            [
                'name' => 'Pumpkin Soup',
                'description' => 'A classic pumpkin soup.',
                'price' => 6.90,
                'image' => 'https://cdn.prod.website-files.com/6321d0d284b5b7ca3857fad3/6324bdfeaccfb04b0713ee16_menu-pumpkin-soup.webp',
                'tag' => 'Starter of the Day',
                'category' => 'starters',
                'discount' => true,
            ],
            // Breack fast
            [
                'name' => 'Delicious Pancakes',
                'description' => 'A classic pancakes.',
                'price' => 8.90,
                'image' => 'https://cdn.prod.website-files.com/6321d0d284b5b7ca3857fad3/6324bdfd807e7a0ec31c4cb3_menu-delicious-pancakes.webp',
                'tag' => '',
                'category' => 'breakfast',
                'discount' => false,
            ],
            [
                'name' => 'Sweet Heaven',
                'description' => 'Lorem ipsum dolor sit amet, consectetur.',
                'price' => 9.90,
                'image' => 'https://cdn.prod.website-files.com/6321d0d284b5b7ca3857fad3/6324bdfeb74070b437ee104c_menu-sweet-heaven.webp',
                'tag' => '',
                'category' => 'breakfast',
                'discount' => false,
            ],
            [
                'name' => 'Oatmeal Spirit',
                'description' => 'A classic pancakes.',
                'price' => 10.90,
                'image' => 'https://cdn.prod.website-files.com/6321d0d284b5b7ca3857fad3/6324bdfef9793b2e8b0c0d57_menu-oatmeak-spirit.webp',
                'tag' => '',
                'category' => 'breakfast',
                'discount' => false,
            ],
            [
                'name' => 'Avocado Smash',
                'description' => 'A classic smash.',
                'price' => 8.90,
                'image' => 'https://cdn.prod.website-files.com/6321d0d284b5b7ca3857fad3/6324bdfd49201e59aa71d9ed_menu-avocado-smash.webp',
                'tag' => '',
                'category' => 'breakfast',
                'discount' => false,
            ],
            // Lunch
            [
                'name' => 'Italian Pizza',
                'description' => 'Lorem ipsum dolor sit amet, consectetur.',
                'price' => 12.90,
                'image' => 'https://cdn.prod.website-files.com/6321d0d284b5b7ca3857fad3/6324bdfe6028d9e2fcf33a00_menu-italian-pizza.webp',
                'tag' => '',
                'category' => 'lunch',
                'discount' => false,
            ],
            [
                'name' => 'Vegan Burger',
                'description' => 'Lorem ipsum dolor sit amet, consectetur.',
                'price' => 13.90,
                'image' => 'https://cdn.prod.website-files.com/6321d0d284b5b7ca3857fad3/6324ce1f2d7ac5ff9103be98_menu-vegan-burger.webp',
                'tag' => '',
                'category' => 'lunch',
                'discount' => false,
            ],
            [
                'name' => 'Sea Curry',
                'description' => 'Lorem ipsum dolor sit amet, consectetur.',
                'price' => 14.90,
                'image' => 'https://cdn.prod.website-files.com/6321d0d284b5b7ca3857fad3/6324bdfe2e736192104b3b38_menu-sea-curry.webp',
                'tag' => 'Lunch of the Day',
                'category' => 'lunch',
                'discount' => true,
            ],
            [
                'name' => 'Noodle Bowl',
                'description' => 'Lorem ipsum dolor sit amet, consectetur.',
                'price' => 9.90,
                'image' => 'https://cdn.prod.website-files.com/6321d0d284b5b7ca3857fad3/6324bdfd2e73617d074b3b33_menu-noodle-bowl.webp',
                'tag' => '',
                'category' => 'lunch',
                'discount' => false,
            ],
            // Drinks
            [
                'name' => 'Panthouse Tonic',
                'description' => 'Lorem ipsum dolor sit amet, consectetur.',
                'price' => 10.90,
                'image' => 'https://cdn.prod.website-files.com/6321d0d284b5b7ca3857fad3/6324bdfde5861b2d12ae2db0_menu-penthouse-tonic.webp',
                'tag' => '',
                'category' => 'drinks',
                'discount' => false,
            ],
            [
                'name' => 'Apple Breeze',
                'description' => 'Lorem ipsum dolor sit amet, consectetur.',
                'price' => 13.90,
                'image' => 'https://cdn.prod.website-files.com/6321d0d284b5b7ca3857fad3/6324bdfdaba5197f1fb6f7ec_menu-apple-breeze.webp',
                'tag' => '',
                'category' => 'drinks',
                'discount' => false,
            ],
            [
                'name' => 'Panthouse Tonic',
                'description' => 'Lorem ipsum dolor sit amet, consectetur.',
                'price' => 8.90,
                'image' => 'https://cdn.prod.website-files.com/6321d0d284b5b7ca3857fad3/6324bdfeeaaecd642994bb12_menu-frenchman-blitz.webp',
                'tag' => '',
                'category' => 'drinks',
                'discount' => false,
            ],
        ];

        foreach ($items as $item) {
            MenuItem::create([
                'name' => $item['name'],
                'description' => $item['description'],
                'price' => $item['price'],
                'image' => $item['image'],
                'tag' => $item['tag'],
                'category_id' => $categories[$item['category']]->id,
                'discount_id' => $item['discount'] ? $discounts->random()->id : null,
            ]);
        }
    }
}

