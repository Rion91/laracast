<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();
        Blog::factory()->create();
        Category::factory()->create([
            'name' => 'Book',
            'user_id'=>1
        ]);
        Category::factory()->create([
            'name' => 'Fruit',
            'user_id'=>1
        ]);

    }
}
