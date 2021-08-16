<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'joe@doe.com',
            'password' => bcrypt('password')
        ]);

        Post::factory(5)->create([
            'user_id' => $user->id,
            'thumbnail' =>'images/illustration-1.png'
        ]);
    }
}
