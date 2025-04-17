<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = [
            'teacher1' => [
                'name' => 'Mohamed Elsayed',
                'image' => 'teacher1.jpeg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet nam mollitia eos quisquam, illo ab architecto',
            ],
            'teacher2' => [
                'name' => 'Ahmed Salah',
                'image' => 'teacher2.jpeg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet nam mollitia eos quisquam, illo ab architecto',
            ],
            'teacher3' => [
                'name' => 'Medo Esam',
                'image' => 'teacher3.jpeg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet nam mollitia eos quisquam, illo ab architecto',
            ],
            'teacher4' => [
                'name' => 'Mohamed Galal',
                'image' => 'teacher4.jpeg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet nam mollitia eos quisquam, illo ab architecto',
            ],
            'teacher5' => [
                'name' => 'Ahmed Zizo',
                'image' => 'teacher5.jpeg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet nam mollitia eos quisquam, illo ab architecto',
            ],
        ];

        foreach($teachers as $teacher){
            Teacher::create([
                'name' => $teacher['name'],
                'image' => $teacher['image'],
                'description' => $teacher['description'],
            ]);
        }
    }
}
