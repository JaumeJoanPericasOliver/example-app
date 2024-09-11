<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       
        $this->call(CategorySeeder::class);

        $AdminUser = new User();
        $AdminUser->name = "Jaume ";
        $AdminUser->email = "jaumepina@gmail.com";
        $AdminUser->role = "superjefetop";
        $AdminUser->password = Hash::make('12345678');
        $AdminUser->save();
        
        User::factory(5)->create();

        Post::factory(5)->create();
        
    }
}
