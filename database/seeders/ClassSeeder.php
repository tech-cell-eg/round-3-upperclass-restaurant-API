<?php

namespace Database\Seeders;

use App\Models\CookingClass;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = [
            'class1' => [
                'title' => 'Asian',
                'sub_title' => 'Delicious Food',
                'image' => 'asian_food.jpg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet nam mollitia eos quisquam, illo ab architecto',
                'price' => 89,
                'date' => '19/4/2025',
                'teacher_id' => 1,
            ],
            'class2' => [
                'title' => 'Breakfast',
                'sub_title' => 'Coffer Time',
                'image' => 'breakfast.jpg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet nam mollitia eos quisquam, illo ab architecto',
                'price' => 75,
                'date' => '22/4/2025',
                'teacher_id' => 2,
            ],
            'class3' => [
                'title' => 'Vegan',
                'sub_title' => 'Vegan Burger',
                'image' => 'vegan.jpg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet nam mollitia eos quisquam, illo ab architecto',
                'price' => 90,
                'date' => '26/4/2025',
                'teacher_id' => 3,
            ],
            'class4' => [
                'title' => 'Italian',
                'sub_title' => 'Salade Style',
                'image' => 'italian.jpg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet nam mollitia eos quisquam, illo ab architecto',
                'price' => 76,
                'date' => '28/4/2025',
                'teacher_id' => 4,
            ],
            'class5' => [
                'title' => 'Italian',
                'sub_title' => 'Homemade Honey',
                'image' => 'homemade_honey.jpg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet nam mollitia eos quisquam, illo ab architecto',
                'price' => 56,
                'date' => '29/4/2025',
                'teacher_id' => 5,
            ],
        ];

        foreach($classes as $class){
            CookingClass::create([
                'title' => $class['title'],
                'sub_title' => $class['sub_title'],
                'image' => $class['image'],
                'description' => $class['description'],
                'price' => $class['price'],
                'date' => Carbon::createFromFormat('d/m/Y', $class['date'])->format('Y-m-d'),
                'teacher_id' => $class['teacher_id'],
            ]);
        }
    }
}
