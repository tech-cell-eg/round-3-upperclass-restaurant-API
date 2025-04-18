<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'user@admin.com',
            'password' => bcrypt('2480123m'),
        ]);

        $this->call([
            SettingsTableSeeder::class,
            TeacherSeeder::class,
            ClassSeeder::class,
            PostSeeder::class,
            MenuItemSeeder::class,
            GiftCardSeeder::class,
            GetInTouchSeeder::class
        ]);
    }
}
