<?php

namespace Database\Seeders;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            'post1' => [
                'title' => 'Gatsby Night',
                'sub_title' => 'Lorem ipsum dolor',
                'image' => 'post1.jpg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet nam mollitia eos quisquam, illo ab architecto
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae sint maxime vero illo laudantium rerum
                                    consectetur voluptate labore ab, amet eveniet ipsa sed et dolor libero autem natus dignissimos accusantium.',
                'date' => '19/12/2022',
            ],
            'post2' => [
                'title' => 'Gift Card Standard',
                'sub_title' => 'Lorem ipsum dolor',
                'image' => 'post2.jpg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet nam mollitia eos quisquam, illo ab architecto
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae sint maxime vero illo laudantium rerum
                                    consectetur voluptate labore ab, amet eveniet ipsa sed et dolor libero autem natus dignissimos accusantium.',
                'date' => '19/12/2022',
            ],
            'post3' => [
                'title' => 'New Restaurant',
                'sub_title' => 'Lorem ipsum dolor',
                'image' => 'post3.jpg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet nam mollitia eos quisquam, illo ab architecto
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae sint maxime vero illo laudantium rerum
                                    consectetur voluptate labore ab, amet eveniet ipsa sed et dolor libero autem natus dignissimos accusantium.',
                'date' => '19/12/2022',
            ],
            'post4' => [
                'title' => 'Romantic Dinner',
                'sub_title' => 'Lorem ipsum dolor',
                'image' => 'post4.jpg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet nam mollitia eos quisquam, illo ab architecto
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae sint maxime vero illo laudantium rerum
                                    consectetur voluptate labore ab, amet eveniet ipsa sed et dolor libero autem natus dignissimos accusantium.',
                'date' => '19/12/2022',
            ],
            'post5' => [
                'title' => 'Brand New Kitchen',
                'sub_title' => 'Lorem ipsum dolor',
                'image' => 'post5.jpg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet nam mollitia eos quisquam, illo ab architecto
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae sint maxime vero illo laudantium rerum
                                    consectetur voluptate labore ab, amet eveniet ipsa sed et dolor libero autem natus dignissimos accusantium.',
                'date' => '19/12/2022',
            ],
        ];

        foreach($posts as $post){
            Post::create([
                'title' => $post['title'],
                'sub_title' => $post['sub_title'],
                'image' => $post['image'],
                'description' => $post['description'],
                'date' => Carbon::createFromFormat('d/m/Y', $post['date'])->format('Y-m-d'),
            ]);
        }
    }
}
