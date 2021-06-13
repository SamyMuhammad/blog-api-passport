<?php

namespace Database\Seeders;

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
        \App\Models\Role::factory(4)->create();
        \App\Models\User::factory(80)->create();
        \App\Models\Category::factory(10)->create();
        \App\Models\Tag::factory(30)->create();
        \App\Models\Post::factory(600)->create();
        $this->call(TagPostSeeder::class);
    }
}
